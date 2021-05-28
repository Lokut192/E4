namespace SqueletteAutoEcole
{
    partial class frmNouvelEleve2
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(frmNouvelEleve2));
            this.cmbForfait = new System.Windows.Forms.ComboBox();
            this.txtVille = new System.Windows.Forms.TextBox();
            this.txtDateInscription = new System.Windows.Forms.TextBox();
            this.txtAdresse = new System.Windows.Forms.TextBox();
            this.txtCP = new System.Windows.Forms.TextBox();
            this.txtPrenom = new System.Windows.Forms.TextBox();
            this.txtNom = new System.Windows.Forms.TextBox();
            this.DateCalendrier = new System.Windows.Forms.MonthCalendar();
            this.btnSauvegarder = new System.Windows.Forms.Button();
            this.lblDI = new System.Windows.Forms.Label();
            this.lblFH = new System.Windows.Forms.Label();
            this.lblVille = new System.Windows.Forms.Label();
            this.lblCP = new System.Windows.Forms.Label();
            this.lblPrenom = new System.Windows.Forms.Label();
            this.lblAdresse = new System.Windows.Forms.Label();
            this.lblNom = new System.Windows.Forms.Label();
            this.queriesTableAdapter1 = new SqueletteAutoEcole.DSAutoEcoleTableAdapters.QueriesTableAdapter();
            this.SuspendLayout();
            // 
            // cmbForfait
            // 
            this.cmbForfait.FormattingEnabled = true;
            this.cmbForfait.Location = new System.Drawing.Point(103, 188);
            this.cmbForfait.Name = "cmbForfait";
            this.cmbForfait.Size = new System.Drawing.Size(101, 21);
            this.cmbForfait.TabIndex = 31;
            // 
            // txtVille
            // 
            this.txtVille.Location = new System.Drawing.Point(231, 141);
            this.txtVille.Name = "txtVille";
            this.txtVille.Size = new System.Drawing.Size(100, 20);
            this.txtVille.TabIndex = 30;
            // 
            // txtDateInscription
            // 
            this.txtDateInscription.Location = new System.Drawing.Point(109, 220);
            this.txtDateInscription.Name = "txtDateInscription";
            this.txtDateInscription.Size = new System.Drawing.Size(95, 20);
            this.txtDateInscription.TabIndex = 29;
            // 
            // txtAdresse
            // 
            this.txtAdresse.Location = new System.Drawing.Point(77, 71);
            this.txtAdresse.Multiline = true;
            this.txtAdresse.Name = "txtAdresse";
            this.txtAdresse.Size = new System.Drawing.Size(279, 64);
            this.txtAdresse.TabIndex = 28;
            // 
            // txtCP
            // 
            this.txtCP.Location = new System.Drawing.Point(90, 141);
            this.txtCP.Name = "txtCP";
            this.txtCP.Size = new System.Drawing.Size(87, 20);
            this.txtCP.TabIndex = 27;
            // 
            // txtPrenom
            // 
            this.txtPrenom.Location = new System.Drawing.Point(256, 29);
            this.txtPrenom.Name = "txtPrenom";
            this.txtPrenom.Size = new System.Drawing.Size(100, 20);
            this.txtPrenom.TabIndex = 26;
            // 
            // txtNom
            // 
            this.txtNom.Location = new System.Drawing.Point(77, 29);
            this.txtNom.Name = "txtNom";
            this.txtNom.Size = new System.Drawing.Size(100, 20);
            this.txtNom.TabIndex = 25;
            // 
            // DateCalendrier
            // 
            this.DateCalendrier.Location = new System.Drawing.Point(216, 179);
            this.DateCalendrier.Name = "DateCalendrier";
            this.DateCalendrier.TabIndex = 24;
            this.DateCalendrier.DateChanged += new System.Windows.Forms.DateRangeEventHandler(this.monthCalendar_DateChanged);
            // 
            // btnSauvegarder
            // 
            this.btnSauvegarder.Location = new System.Drawing.Point(29, 289);
            this.btnSauvegarder.Name = "btnSauvegarder";
            this.btnSauvegarder.Size = new System.Drawing.Size(123, 31);
            this.btnSauvegarder.TabIndex = 23;
            this.btnSauvegarder.Text = "Sauvegarder";
            this.btnSauvegarder.UseVisualStyleBackColor = true;
            this.btnSauvegarder.Click += new System.EventHandler(this.btnSauvegarder_Click);
            // 
            // lblDI
            // 
            this.lblDI.AutoSize = true;
            this.lblDI.Location = new System.Drawing.Point(26, 223);
            this.lblDI.Name = "lblDI";
            this.lblDI.Size = new System.Drawing.Size(80, 13);
            this.lblDI.TabIndex = 22;
            this.lblDI.Text = "Date inscription";
            // 
            // lblFH
            // 
            this.lblFH.AutoSize = true;
            this.lblFH.Location = new System.Drawing.Point(26, 188);
            this.lblFH.Name = "lblFH";
            this.lblFH.Size = new System.Drawing.Size(71, 13);
            this.lblFH.TabIndex = 21;
            this.lblFH.Text = "Forfait horaire";
            // 
            // lblVille
            // 
            this.lblVille.AutoSize = true;
            this.lblVille.Location = new System.Drawing.Point(190, 148);
            this.lblVille.Name = "lblVille";
            this.lblVille.Size = new System.Drawing.Size(26, 13);
            this.lblVille.TabIndex = 20;
            this.lblVille.Text = "Ville";
            // 
            // lblCP
            // 
            this.lblCP.AutoSize = true;
            this.lblCP.Location = new System.Drawing.Point(26, 148);
            this.lblCP.Name = "lblCP";
            this.lblCP.Size = new System.Drawing.Size(64, 13);
            this.lblCP.TabIndex = 19;
            this.lblCP.Text = "Code Postal";
            // 
            // lblPrenom
            // 
            this.lblPrenom.AutoSize = true;
            this.lblPrenom.Location = new System.Drawing.Point(190, 29);
            this.lblPrenom.Name = "lblPrenom";
            this.lblPrenom.Size = new System.Drawing.Size(43, 13);
            this.lblPrenom.TabIndex = 18;
            this.lblPrenom.Text = "Prénom";
            // 
            // lblAdresse
            // 
            this.lblAdresse.AutoSize = true;
            this.lblAdresse.Location = new System.Drawing.Point(26, 74);
            this.lblAdresse.Name = "lblAdresse";
            this.lblAdresse.Size = new System.Drawing.Size(45, 13);
            this.lblAdresse.TabIndex = 17;
            this.lblAdresse.Text = "Adresse";
            // 
            // lblNom
            // 
            this.lblNom.AutoSize = true;
            this.lblNom.Location = new System.Drawing.Point(26, 29);
            this.lblNom.Name = "lblNom";
            this.lblNom.Size = new System.Drawing.Size(29, 13);
            this.lblNom.TabIndex = 16;
            this.lblNom.Text = "Nom";
            // 
            // frmNouvelEleve2
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(469, 360);
            this.Controls.Add(this.cmbForfait);
            this.Controls.Add(this.txtVille);
            this.Controls.Add(this.txtDateInscription);
            this.Controls.Add(this.txtAdresse);
            this.Controls.Add(this.txtCP);
            this.Controls.Add(this.txtPrenom);
            this.Controls.Add(this.txtNom);
            this.Controls.Add(this.DateCalendrier);
            this.Controls.Add(this.btnSauvegarder);
            this.Controls.Add(this.lblDI);
            this.Controls.Add(this.lblFH);
            this.Controls.Add(this.lblVille);
            this.Controls.Add(this.lblCP);
            this.Controls.Add(this.lblPrenom);
            this.Controls.Add(this.lblAdresse);
            this.Controls.Add(this.lblNom);
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Name = "frmNouvelEleve2";
            this.Text = "Nouvel Eleve";
            this.Load += new System.EventHandler(this.frmNouvelEleve2_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ComboBox cmbForfait;
        private System.Windows.Forms.TextBox txtVille;
        private System.Windows.Forms.TextBox txtDateInscription;
        private System.Windows.Forms.TextBox txtAdresse;
        private System.Windows.Forms.TextBox txtCP;
        private System.Windows.Forms.TextBox txtPrenom;
        private System.Windows.Forms.TextBox txtNom;
        private System.Windows.Forms.MonthCalendar DateCalendrier;
        private System.Windows.Forms.Button btnSauvegarder;
        private System.Windows.Forms.Label lblDI;
        private System.Windows.Forms.Label lblFH;
        private System.Windows.Forms.Label lblVille;
        private System.Windows.Forms.Label lblCP;
        private System.Windows.Forms.Label lblPrenom;
        private System.Windows.Forms.Label lblAdresse;
        private System.Windows.Forms.Label lblNom;
        private DSAutoEcoleTableAdapters.QueriesTableAdapter queriesTableAdapter1;
    }
}