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
    public partial class Form7 : Form
    {
        private OdbcConnection con;
        private DataTable dataTable;
        private OdbcDataAdapter adapter;
        private string ci; 

        public Form7(string ci)
        {
            InitializeComponent();
            this.ci = ci;
        }

        private void Form7_Load(object sender, EventArgs e)
        {
            con = new OdbcConnection("DSN=BDWilmer");
            string query = "SELECT zona, x_ini, y_ini, x_fin, y_fin, superficie, distrito FROM catastro WHERE ci = '" + ci + "';";

            adapter = new OdbcDataAdapter(query, con);
            dataTable = new DataTable();
            adapter.Fill(dataTable);
            dataGridView1.DataSource = dataTable;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}
