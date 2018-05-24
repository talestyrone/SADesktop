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
    public partial class LoginForm : Form
    {
        public LoginForm()
        {
            InitializeComponent();
        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void btnClose_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void btnLogin_Click(object sender, EventArgs e)
        {
            string username = txtUsername.Text;
            string password = txtPassword.Text;
            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            string query = "SELECT * FROM developers WHERE username = '"+username+"' AND password = '"+password+"'";

            MySqlConnection dbConn = new MySqlConnection(connStr);
            MySqlCommand command = new MySqlCommand(query, dbConn);
            MySqlDataReader reader;

            if (username == "" || password == "")
            {
                MessageBox.Show("Do not leave the fields empty.", "Empty Fields");
            }
            else
            {
                try
                {
                    dbConn.Open();
                    reader = command.ExecuteReader();

                    if (reader.HasRows)
                    {
                        while (reader.Read())
                        {
                            if (reader.GetString(1) == username || reader.GetString(2) == password)
                            {
                                MessageBox.Show("Login successful.", "Success.");
                                this.Hide();
                                var usersWindow = new Mainpage();
                                usersWindow.Show();
                            }
                            else
                            {
                                MessageBox.Show("Either you have entered the credentials incorrectly or they do not exist.");
                            }
                        }
                    }
                    else
                    {
                        MessageBox.Show("Either you have entered the credentials incorrectly or they do not exist.");
                    }
                    dbConn.Close();
                }
                catch (Exception)
                {
                }
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Hide();
            var usersWindow = new Register();
            usersWindow.Show();
        }
    }
}
