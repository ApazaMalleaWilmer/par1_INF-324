using System;
using System.Net;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.Odbc;
using System.Drawing;

using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace e5
{
    public partial class Form2 : Form

    {
        private OdbcConnection con;
        private DataTable dataTable;
        private OdbcDataAdapter adapter;
        public Form2()
        {
            InitializeComponent();
        }

        private void Form2_Load(object sender, EventArgs e)
        {
            
            using (WebClient webClient = new WebClient())
            {
                byte[] imageBytes = webClient.DownloadData("https://seeklogo.com/images/G/gobierno-autonomo-municipal-de-la-paz-bolivia-logo-88A067340B-seeklogo.com.png");
                using (var ms = new System.IO.MemoryStream(imageBytes))
                {
                    pictureBox1.Image = Image.FromStream(ms);
                }
            }
            pictureBox1.SizeMode = PictureBoxSizeMode.Zoom;

            con = new OdbcConnection("DSN=BDWilmer");
            string query = "SELECT d.ci, p.nombre, p.paterno, p.materno FROM duenio d, persona p WHERE d.ci = p.ci";
            adapter = new OdbcDataAdapter(query, con);
            dataTable = new DataTable();
            adapter.Fill(dataTable);
            dataGridView1.DataSource = dataTable;


            dataGridView1.ReadOnly = false;
            dataGridView1.AllowUserToAddRows = false;
            dataGridView1.AllowUserToDeleteRows = false;

            dataGridView1.CellEndEdit += dataGridView1_CellEndEdit;
        }

        private void dataGridView1_CellEndEdit(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void dataGridView1_CellValueChanged(object sender, DataGridViewCellEventArgs e)
        {
            if (e.RowIndex >= 0) 
            {
                ActualizarDatosCatastro(e.RowIndex);
            }

        }
        private void ActualizarDatosCatastro(int rowIndex)
        {
            OdbcConnection con = new OdbcConnection();
            con.ConnectionString = "DSN=BDWilmer";
            con.Open();


            var ci = dataGridView1.Rows[rowIndex].Cells[0].Value;

            var nombre = dataGridView1.Rows[rowIndex].Cells[1].Value;
            var paterno = dataGridView1.Rows[rowIndex].Cells[2].Value;
            var materno = dataGridView1.Rows[rowIndex].Cells[3].Value;


            string updateQuery = "UPDATE persona SET nombre = '" + nombre +
                                 "', paterno = '" + paterno +
                                 "', materno = '" + materno +

                                 "' WHERE ci = '" + ci + "'";

            using (OdbcCommand cmd = new OdbcCommand(updateQuery, con))
            {
                cmd.ExecuteNonQuery(); 
            }

            con.Close();
        }

        private void EliminarTodo_Click(object sender, EventArgs e)
        {
            if (dataGridView1.SelectedRows.Count > 0)
            {
                string ci = dataGridView1.SelectedRows[0].Cells["ci"].Value.ToString();

                DialogResult dialogResult = MessageBox.Show("¿Está seguro de que desea eliminar al dueño con CI " + ci + " y todos sus datos relacionados?", "Confirmar eliminación", MessageBoxButtons.YesNo);
                if (dialogResult == DialogResult.Yes)
                {

                    con.Open();

                    string deleteCatastroQuery = "DELETE FROM catastro WHERE ci = '" + ci + "'";
                    using (OdbcCommand cmd = new OdbcCommand(deleteCatastroQuery, con))
                    {
                        cmd.ExecuteNonQuery();
                    }

                    string deleteDuenioQuery = "DELETE FROM duenio WHERE ci = '" + ci + "'";
                    using (OdbcCommand cmd = new OdbcCommand(deleteDuenioQuery, con))
                    {
                        cmd.ExecuteNonQuery();
                    }

                    string deletePersonaQuery = "DELETE FROM persona WHERE ci = '" + ci + "'";
                    using (OdbcCommand cmd = new OdbcCommand(deletePersonaQuery, con))
                    {
                        cmd.ExecuteNonQuery();
                    }

                    con.Close();


                    string query = "SELECT d.ci, p.nombre, p.paterno, p.materno FROM duenio d, persona p WHERE d.ci = p.ci";
                    adapter = new OdbcDataAdapter(query, con);
                    dataTable = new DataTable();
                    adapter.Fill(dataTable);
                    dataGridView1.DataSource = dataTable;
                }
            }
            else
            {
                MessageBox.Show("Por favor, seleccione una fila para eliminar.");
            }

        }

        private void agregar_Click(object sender, EventArgs e)
        {
            Form3 form3 = new Form3();

            form3.Show();
            this.Close();
        }

        private void Editar_Click(object sender, EventArgs e)
        {
            if (dataGridView1.SelectedRows.Count > 0)
            {
                string ci = dataGridView1.SelectedRows[0].Cells["ci"].Value.ToString();

                Form4 form4 = new Form4();
                form4.Ci = ci; 
                form4.Show(); 
            }
            else
            {
                MessageBox.Show("Por favor, seleccione una fila para editar.");
            }

        }
    }
}
