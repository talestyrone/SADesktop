using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace _4._2A_Demo
{
    public partial class Mainpage : Form
    {
        public Mainpage()
        {
            InitializeComponent();
        }

        private void button4_Click(object sender, EventArgs e)
        {

            var usersWindow = new Threads();
            usersWindow.Show();
        }

        private void Mainpage_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            var usersWindow = new Users();
            usersWindow.Show();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            var usersWindow = new ReportedThreads();
            usersWindow.Show();
        }
    }
}
