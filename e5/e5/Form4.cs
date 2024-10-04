using System;
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
    public partial class Form4 : Form
    {
        public string Ci { get; set; }
        public Form4()
        {
            InitializeComponent();
        }

        private void Form4_Load(object sender, EventArgs e)
        {
            label1.Text = Ci;
            CargarDatosCatastro();
        }
        private void CargarDatosCatastro()
        {
            OdbcConnection con = new OdbcConnection();
            con.ConnectionString = "DSN=BDWilmer";
            con.Open();

            string query = "SELECT * FROM catastro WHERE ci = '" + label1.Text + "'";
            using (OdbcDataAdapter adapter = new OdbcDataAdapter(query, con))
            {
                DataTable dataTable = new DataTable();
                adapter.Fill(dataTable);
                dataGridView1.DataSource = dataTable;
            }
            con.Close();
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

            var id = dataGridView1.Rows[rowIndex].Cells[0].Value;

            var zona = dataGridView1.Rows[rowIndex].Cells[1].Value;
            var x_ini = dataGridView1.Rows[rowIndex].Cells[2].Value;
            var y_ini = dataGridView1.Rows[rowIndex].Cells[3].Value;
            var x_fin = dataGridView1.Rows[rowIndex].Cells[4].Value;
            var y_fin = dataGridView1.Rows[rowIndex].Cells[5].Value;
            var superficie = dataGridView1.Rows[rowIndex].Cells[6].Value;
            var ci = dataGridView1.Rows[rowIndex].Cells[7].Value;
            var distrito = dataGridView1.Rows[rowIndex].Cells[8].Value;

            string updateQuery = "UPDATE catastro SET zona = '" + zona +
                                 "', x_ini = '" + x_ini +
                                 "', y_ini = '" + y_ini +
                                 "', x_fin = '" + x_fin +
                                 "', y_fin = '" + y_fin +
                                 "', superficie = '" + superficie +
                                 "', ci = '" + ci +
                                 "', distrito = '" + distrito +
                                 "' WHERE id = '" + id + "'";

            using (OdbcCommand cmd = new OdbcCommand(updateQuery, con))
            {
                cmd.ExecuteNonQuery(); 
            }

            con.Close();
        }

        private void eliminar_Click(object sender, EventArgs e)
        {
            if (dataGridView1.SelectedRows.Count > 0)
            {
                int rowIndex = dataGridView1.SelectedRows[0].Index; 
                EliminarDatosCatastro(rowIndex); 
            }
            else
            {
                MessageBox.Show("Por favor, seleccione una fila para eliminar."); // Mensaje de advertencia si no hay selección
            }

        }
        private void EliminarDatosCatastro(int rowIndex)
        {
            OdbcConnection con = new OdbcConnection();
            con.ConnectionString = "DSN=BDWilmer";
            con.Open();

            var id = dataGridView1.Rows[rowIndex].Cells[0].Value;

            string deleteQuery = "DELETE FROM catastro WHERE id = '" + id + "'";

            using (OdbcCommand cmd = new OdbcCommand(deleteQuery, con))
            {
                cmd.ExecuteNonQuery(); 
            }

            con.Close();
            CargarDatosCatastro();
        }

        private void Agregar_Click(object sender, EventArgs e)
        {
            Form5 form5 = new Form5();
            form5.Ci = Ci; 
            form5.Show();  

            this.Close();
        }

        private void cerrar_Click(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}
