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
    public partial class Form1 : Form
    {
        private OdbcConnection con;
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            
            using (WebClient webClient = new WebClient())
            {
                byte[] imageBytes = webClient.DownloadData("https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png");
                using (var ms = new System.IO.MemoryStream(imageBytes))
                {
                    pictureBox1.Image = Image.FromStream(ms);
                }
            }
            pictureBox1.SizeMode = PictureBoxSizeMode.Zoom;

        }

        private void login_Click(object sender, EventArgs e)
        {
            using (OdbcConnection con = new OdbcConnection("DSN=BDWilmer"))
            {
                con.Open();

                var usuario = textBox1.Text;
                var contraseña = textBox2.Text;

                string Query = "SELECT * FROM funcionario WHERE usuario = '" + usuario + "' AND contraseña = '" + contraseña + "'";

                using (OdbcCommand cmd = new OdbcCommand(Query, con))
                {
                    using (OdbcDataReader reader = cmd.ExecuteReader())
                    {
                        if (reader.HasRows)
                        {
                            con.Close(); 

                            Form2 form2 = new Form2();
                            form2.Show();

      
                          
                        }
                        else
                        {
                            MessageBox.Show("Usuario o contraseña incorrectos.");
                            textBox1.Text = "";
                            textBox2.Text = "";
                        }
                    }
                }
            }
        }


        private void duenio_Click(object sender, EventArgs e)
        {
            Form6 form6 = new Form6();
            form6.Show();

        }
    }
}
