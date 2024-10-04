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
    public partial class Form5 : Form
    {
        public string Ci { get; set; }
        private OdbcConnection con;
        public Form5()
        {
            InitializeComponent();
        }

        private void Form5_Load(object sender, EventArgs e)
        {
            label9.Text = Ci;
        }

        private void Agregar_Click(object sender, EventArgs e)
        {
            string id = textBox1.Text;
            string zona = textBox2.Text;
            string x_ini = textBox3.Text;
            string y_ini = textBox4.Text;
            string x_fin = textBox5.Text;
            string y_fin = textBox6.Text;
            string superficie = textBox7.Text;
            string distrito = textBox8.Text;

            con = new OdbcConnection("DSN=BDWilmer");

            try
            {
                con.Open();

                string insertCatastroQuery = "INSERT INTO catastro (id, zona, x_ini, y_ini,x_fin,y_fin,superficie,ci,distrito) " +
                                            "VALUES ('" + id + "', '" + zona + "', '" + x_ini + "', '" + y_ini + "','" + x_fin + "','" + y_fin + "','" + superficie + "','" + Ci + "','" + distrito + "')";


                using (OdbcCommand command = new OdbcCommand(insertCatastroQuery, con))
                {
                    command.ExecuteNonQuery();
                }


                MessageBox.Show("Datos agregados correctamente.");
                this.Close();
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message);
            }
            finally
            {
                Form4 form4 = new Form4();
                form4.Ci = Ci; 
                form4.Show(); 
  
                if (con != null && con.State == System.Data.ConnectionState.Open)
                {
                    con.Close();
                }
            }

        }

        private void Cancelar_Click(object sender, EventArgs e)
        {
            this.Close(); 
        }
    }
}
