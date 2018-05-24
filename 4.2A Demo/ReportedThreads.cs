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
    public partial class ReportedThreads : Form
    {
        public ReportedThreads()
        {
            InitializeComponent();
        }

        private void reportedThreads_Load(object sender, EventArgs e)
        {
            webBrowser1.Navigate("localhost:8084/Website/viewthreads.php");
        }

        private void webBrowser1_DocumentCompleted(object sender, WebBrowserDocumentCompletedEventArgs e)
        {

        }

        private void webBrowser2_DocumentCompleted(object sender, WebBrowserDocumentCompletedEventArgs e)
        {
            webBrowser1.Navigate("localhost/NEW/submit.php");
        }

        private void webBrowser2_DocumentCompleted_1(object sender, WebBrowserDocumentCompletedEventArgs e)
        {

        }
    }
}
