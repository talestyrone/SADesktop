using System;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace _4._2A_Demo
{
    static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new Register());
            //ConnectAndRetrieve();
            //ConnectAndInsert();
        }

        public static void ConnectAndRetrieve()
        {
            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            string query = "SELECT * FROM users";

            MySqlConnection dbConn = new MySqlConnection(connStr);
            MySqlCommand command = new MySqlCommand(query, dbConn);
            MySqlDataReader reader;

            try
            {
                dbConn.Open();
                reader = command.ExecuteReader();

                if (reader.HasRows)
                {
                    while (reader.Read())
                    {
                        MessageBox.Show(
                                reader.GetInt32(0).ToString() + " " +
                                reader.GetString(1) + " " +
                                reader.GetString(2) + " " +
                                reader.GetString(3) + " " +
                                reader.GetDateTime(4).ToString() + " " +
                                reader.GetInt32(0).ToString());
                    }
                }

                dbConn.Close();
            }
            catch(Exception)
            {
            }

        }

        public static void ConnectAndInsert()
        {
            string connStr = "datasource=localhost;port=3307;username=root;password=;database=studentsassistance;";
            //string query = "INSERT INTO products(name,price,category) VALUES ('Water', 0.80, 3)";
            //string query = "DELETE FROM products WHERE name='Water'";
            string query = "UPDATE users SET name=tyrone";

            MySqlConnection dbConn = new MySqlConnection(connStr);
            MySqlCommand command = new MySqlCommand(query, dbConn);
            MySqlDataReader reader;

            try
            {
                dbConn.Open();
                reader = command.ExecuteReader();                

                dbConn.Close();
            }
            catch (Exception)
            {
                MessageBox.Show("Problem!");
            }

        }
    }
}
