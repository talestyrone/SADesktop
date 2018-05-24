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
    public partial class Users : Form
    {
        public Users()
        {
            InitializeComponent();
            refreshList();
        }

        public void ConnectAndRetrieveUsername()
        {
            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            string query = "SELECT * FROM users WHERE users.username LIKE '%"+txtUsername.Text+"%'";

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
                                reader.GetString(1),
                                reader.GetString(2),
                                reader.GetString(3),
                                reader.GetDateTime(4).ToString(),
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

        public void ConnectAndRetrieveUserid()
        {
            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            string query = "SELECT * FROM users WHERE users.userid LIKE '%" + txtUserid.Text + "%'";

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
                                reader.GetString(1),
                                reader.GetString(2),
                                reader.GetString(3),
                                reader.GetDateTime(4).ToString(),
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

        private void button1_Click(object sender, EventArgs e)
        {
            ConnectAndRetrieveUsername();
        }

        private void txtUsername_KeyUp(object sender, KeyEventArgs e)
        {
            ConnectAndRetrieveUsername();
        }

        private void txtUserid_KeyUp(object sender, KeyEventArgs e)
        {
            ConnectAndRetrieveUserid();
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void listView1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void txtUserid_TextChanged(object sender, EventArgs e)
        {
            ConnectAndRetrieveUserid();
        }

        private void button1_Click_1(object sender, EventArgs e)
        {

            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            string query = "UPDATE users SET users.banStatus = 1 WHERE users.userid = '"+txtPunishmentId.Text +"'";

            MySqlConnection dbConn = new MySqlConnection(connStr);
            MySqlCommand command = new MySqlCommand(query, dbConn);
            MessageBox.Show("User with ID: '" + txtPunishmentId + "' has been banned.");
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

        private void button2_Click(object sender, EventArgs e)
        {
            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            string query = "UPDATE users SET users.banStatus = 0 WHERE users.userid = '" + txtPunishmentId.Text + "'";

            MySqlConnection dbConn = new MySqlConnection(connStr);
            MySqlCommand command = new MySqlCommand(query, dbConn);
            refreshList();
            MessageBox.Show("User with ID: '" + txtPunishmentId + "' has been unbanned.");
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

        public void refreshList()
        {
            listView1.Items.Clear();
            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            string query = "SELECT * FROM users";

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
                                reader.GetString(1),
                                reader.GetString(2),
                                reader.GetString(3),
                                reader.GetDateTime(4).ToString(),
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
    }
}
