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
    public partial class Form6 : Form
    {
        public Form6()
        {
            InitializeComponent();
        }

        private void Form6_Load(object sender, EventArgs e)
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

        private void Login_Click(object sender, EventArgs e)
        {
            using (OdbcConnection con = new OdbcConnection("DSN=BDWilmer"))
            {
                con.Open();

                var usuario = textBox1.Text;
                var contraseña = textBox2.Text;


                string Query = "SELECT ci FROM duenio WHERE usuario = '" + usuario + "' AND contraseña = '" + contraseña + "'";

                using (OdbcCommand cmd = new OdbcCommand(Query, con))
                {

                    var result = cmd.ExecuteScalar();

                    if (result != null)
                    {
                        con.Close();

                        string ci = result.ToString();

                        Form7 form7 = new Form7(ci);
                        form7.Show();

                        MessageBox.Show("Bienvenido " + textBox1.Text + "!");
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


        private void Atras_Click(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}
