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
    public partial class Register : Form
    {
        public Register()
        {
            InitializeComponent();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string username = txtUsername.Text;
            string password = txtPassword.Text;
            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            string query = "INSERT INTO developers (username, password) VALUES ('"+username+"', '"+password+"')";
            
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
                    dbConn.Close();
                    MessageBox.Show("Registered, you can now login.", "Successful.");

                    this.Hide();
                    var usersWindow = new LoginForm();
                    usersWindow.Show();
                }
                catch (Exception)
                {
                    MessageBox.Show("That developer name already exists.", "Error; Duplicate");
                }
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            this.Hide();
            var usersWindow = new LoginForm();
            usersWindow.Show();
        }
    }
    }