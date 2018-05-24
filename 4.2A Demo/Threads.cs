using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace _4._2A_Demo
{
    public partial class Threads : Form
    {
        public Threads()
        {
            InitializeComponent();
            ConnectAndRetrieveThreads();
        }

        public void ConnectAndRetrieveThreads()
        {
            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            string query = "SELECT * FROM threads";

            MySqlConnection dbConn = new MySqlConnection(connStr);
            MySqlCommand command = new MySqlCommand(query, dbConn);
            MySqlDataReader reader;

            try
            {
                dbConn.Open();
                reader = command.ExecuteReader();
                listView1.View = View.Details;
                listView1.Items.Clear();

                if (reader.HasRows)
                {
                    while (reader.Read())
                    {
                        string[] row =
                            {
                                reader.GetInt32(0).ToString(),
                                reader.GetInt32(1).ToString(),
                                reader.GetString(2),
                                reader.GetString(3),
                                reader.GetString(4),
                                reader.GetInt32(5).ToString()
                            };
                        ListViewItem item = new ListViewItem(row);
                        listView1.Items.Add(item);
                    }
                }
                dbConn.Close();
            }
            catch (Exception)
            {
            }

        }

        public void refreshList()
        {
            listView1.Items.Clear();
            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            string query = "SELECT * FROM threads";

            MySqlConnection dbConn = new MySqlConnection(connStr);
            MySqlCommand command = new MySqlCommand(query, dbConn);
            MySqlDataReader reader;

            try
            {
                dbConn.Open();
                reader = command.ExecuteReader();
                listView1.View = View.Details;
                listView1.Items.Clear();

                if (reader.HasRows)
                {
                    while (reader.Read())
                    {
                        string[] row =
                            {
                                reader.GetInt32(0).ToString(),
                                reader.GetInt32(1).ToString(),
                                reader.GetString(2),
                                reader.GetString(3),
                                reader.GetString(4),
                                reader.GetInt32(5).ToString()
                            };
                        ListViewItem item = new ListViewItem(row);
                        listView1.Items.Add(item);
                    }
                }
                dbConn.Close();
            }
            catch (Exception)
            {
            }
        }

        private void listView1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            string query = "DELETE FROM threads WHERE threads.threadId = '" + txtThreadID.Text + "'";

            MySqlConnection dbConn = new MySqlConnection(connStr);
            MySqlCommand command = new MySqlCommand(query, dbConn);
            MessageBox.Show("Thread with ID: '" + txtThreadID.Text + "' has been removed.");
            MySqlDataReader reader;

            try
            {
                dbConn.Open();
                reader = command.ExecuteReader();
                if (reader.HasRows)
                {
                    while (reader.Read())
                    {
                        string[] row =
                            {
                                reader.GetString(1),
                                reader.GetString(2)
                            };
                    }

                }

                dbConn.Close();
            }
            catch (Exception)
            {
            }
            listView1.Items.Clear();
            refreshList();
        }
    }
}
