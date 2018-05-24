namespace _4._2A_Demo
{
    partial class Threads
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.listView1 = new System.Windows.Forms.ListView();
            this.id = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.username = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.password = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.email = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.registerDate = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.banStatus = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.button1 = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.txtThreadID = new System.Windows.Forms.TextBox();
            this.label4 = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // listView1
            // 
            this.listView1.Columns.AddRange(new System.Windows.Forms.ColumnHeader[] {
            this.id,
            this.username,
            this.password,
            this.email,
            this.registerDate,
            this.banStatus});
            this.listView1.FullRowSelect = true;
            this.listView1.ImeMode = System.Windows.Forms.ImeMode.Off;
            this.listView1.Location = new System.Drawing.Point(12, 75);
            this.listView1.Name = "listView1";
            this.listView1.Size = new System.Drawing.Size(661, 256);
            this.listView1.TabIndex = 1;
            this.listView1.UseCompatibleStateImageBehavior = false;
            // 
            // id
            // 
            this.id.Text = "ThreadID";
            // 
            // username
            // 
            this.username.Text = "UserID";
            // 
            // password
            // 
            this.password.Text = "Username";
            // 
            // email
            // 
            this.email.Text = "Title";
            // 
            // registerDate
            // 
            this.registerDate.Text = "Contents";
            // 
            // banStatus
            // 
            this.banStatus.Text = "Category";
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(195, 12);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(75, 45);
            this.button1.TabIndex = 2;
            this.button1.Text = "Delete Thread";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(20, 28);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(58, 13);
            this.label1.TabIndex = 3;
            this.label1.Text = "Thread ID:";
            // 
            // txtThreadID
            // 
            this.txtThreadID.Location = new System.Drawing.Point(89, 25);
            this.txtThreadID.Name = "txtThreadID";
            this.txtThreadID.Size = new System.Drawing.Size(100, 20);
            this.txtThreadID.TabIndex = 4;
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Monotype Corsiva", 27.75F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.Location = new System.Drawing.Point(347, 12);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(293, 45);
            this.label4.TabIndex = 8;
            this.label4.Text = "StudentsAssistance";
            // 
            // Threads
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(685, 343);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.txtThreadID);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.listView1);
            this.Name = "Threads";
            this.Text = "Remove Threads";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ListView listView1;
        private System.Windows.Forms.ColumnHeader id;
        private System.Windows.Forms.ColumnHeader username;
        private System.Windows.Forms.ColumnHeader password;
        private System.Windows.Forms.ColumnHeader email;
        private System.Windows.Forms.ColumnHeader registerDate;
        private System.Windows.Forms.ColumnHeader banStatus;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox txtThreadID;
        private System.Windows.Forms.Label label4;
    }
}