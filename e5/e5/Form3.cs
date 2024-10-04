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
    public partial class Form3 : Form
    {
        private OdbcConnection con;
        public Form3()
        {
            InitializeComponent();
        }

        private void Form3_Load(object sender, EventArgs e)
        {

        }

        private void agregar_Click(object sender, EventArgs e)
        {
            string ci = textBox1.Text;
            string nombre = textBox2.Text;
            string paterno = textBox3.Text;
            string materno = textBox4.Text;
            string usuario = textBox5.Text;
            string contraseña = textBox6.Text;

            con = new OdbcConnection("DSN=BDWilmer");

            try
            {
                con.Open();

                string insertPersonaQuery = "INSERT INTO persona (ci, nombre, paterno, materno) " +
                                            "VALUES ('" + ci + "', '" + nombre + "', '" + paterno + "', '" + materno + "')";

                string insertDuenioQuery = "INSERT INTO duenio (ci, usuario, contraseña) " +
                                           "VALUES ('" + ci + "', '" + usuario + "', '" + contraseña + "')";

                using (OdbcCommand command = new OdbcCommand(insertPersonaQuery, con))
                {
                    command.ExecuteNonQuery();
                }

                using (OdbcCommand command = new OdbcCommand(insertDuenioQuery, con))
                {
                    command.ExecuteNonQuery();
                }
                

                MessageBox.Show("Datos agregados correctamente.");
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message);
            }
            finally
            {
                Form2 form2 = new Form2();
                form2.Show();
                if (con != null && con.State == System.Data.ConnectionState.Open)
                {
                    con.Close();
                }
            }

        }

        private void Cancelar_Click(object sender, EventArgs e)
        {
            Form2 form2 = new Form2();


            form2.Show();
            this.Close();
        }
    }
}
