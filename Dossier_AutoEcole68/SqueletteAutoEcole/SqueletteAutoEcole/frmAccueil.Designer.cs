namespace SqueletteAutoEcole
{
    partial class frmAccueil
    {
        /// <summary>
        /// Variable nécessaire au concepteur.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Nettoyage des ressources utilisées.
        /// </summary>
        /// <param name="disposing">true si les ressources managées doivent être supprimées ; sinon, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Code généré par le Concepteur Windows Form

        /// <summary>
        /// Méthode requise pour la prise en charge du concepteur - ne modifiez pas
        /// le contenu de cette méthode avec l'éditeur de code.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(frmAccueil));
            this.menuStrip1 = new System.Windows.Forms.MenuStrip();
            this.fichierToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.quitterToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.elèveToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.nouvelÉlèveToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.leçonToolStripMenuItem1 = new System.Windows.Forms.ToolStripMenuItem();
            this.véhiculeToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.gestionToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.listeToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.menuStrip1.SuspendLayout();
            this.SuspendLayout();
            // 
            // menuStrip1
            // 
            this.menuStrip1.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.fichierToolStripMenuItem,
            this.elèveToolStripMenuItem,
            this.véhiculeToolStripMenuItem});
            this.menuStrip1.Location = new System.Drawing.Point(0, 0);
            this.menuStrip1.Name = "menuStrip1";
            this.menuStrip1.Size = new System.Drawing.Size(473, 24);
            this.menuStrip1.TabIndex = 2;
            this.menuStrip1.Text = "menuStrip1";
            this.menuStrip1.ItemClicked += new System.Windows.Forms.ToolStripItemClickedEventHandler(this.menuStrip1_ItemClicked);
            // 
            // fichierToolStripMenuItem
            // 
            this.fichierToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.quitterToolStripMenuItem});
            this.fichierToolStripMenuItem.Name = "fichierToolStripMenuItem";
            this.fichierToolStripMenuItem.Size = new System.Drawing.Size(54, 20);
            this.fichierToolStripMenuItem.Text = "Fichier";
            this.fichierToolStripMenuItem.Click += new System.EventHandler(this.fichierToolStripMenuItem_Click);
            // 
            // quitterToolStripMenuItem
            // 
            this.quitterToolStripMenuItem.Name = "quitterToolStripMenuItem";
            this.quitterToolStripMenuItem.Size = new System.Drawing.Size(180, 22);
            this.quitterToolStripMenuItem.Text = "Quitter";
            this.quitterToolStripMenuItem.Click += new System.EventHandler(this.QuitterToolStripMenuItem_Click);
            // 
            // elèveToolStripMenuItem
            // 
            this.elèveToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.nouvelÉlèveToolStripMenuItem,
            this.leçonToolStripMenuItem1});
            this.elèveToolStripMenuItem.Name = "elèveToolStripMenuItem";
            this.elèveToolStripMenuItem.Size = new System.Drawing.Size(46, 20);
            this.elèveToolStripMenuItem.Text = "Elève";
            // 
            // nouvelÉlèveToolStripMenuItem
            // 
            this.nouvelÉlèveToolStripMenuItem.Name = "nouvelÉlèveToolStripMenuItem";
            this.nouvelÉlèveToolStripMenuItem.Size = new System.Drawing.Size(180, 22);
            this.nouvelÉlèveToolStripMenuItem.Text = "Nouvel élève";
            this.nouvelÉlèveToolStripMenuItem.Click += new System.EventHandler(this.nouvelÉlèveToolStripMenuItem_Click);
            // 
            // leçonToolStripMenuItem1
            // 
            this.leçonToolStripMenuItem1.Name = "leçonToolStripMenuItem1";
            this.leçonToolStripMenuItem1.Size = new System.Drawing.Size(180, 22);
            this.leçonToolStripMenuItem1.Text = "Leçon";
            // 
            // véhiculeToolStripMenuItem
            // 
            this.véhiculeToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.gestionToolStripMenuItem,
            this.listeToolStripMenuItem});
            this.véhiculeToolStripMenuItem.Name = "véhiculeToolStripMenuItem";
            this.véhiculeToolStripMenuItem.Size = new System.Drawing.Size(63, 20);
            this.véhiculeToolStripMenuItem.Text = "Véhicule";
            // 
            // gestionToolStripMenuItem
            // 
            this.gestionToolStripMenuItem.Name = "gestionToolStripMenuItem";
            this.gestionToolStripMenuItem.Size = new System.Drawing.Size(114, 22);
            this.gestionToolStripMenuItem.Text = "Gestion";
            this.gestionToolStripMenuItem.Click += new System.EventHandler(this.gestionToolStripMenuItem_Click);
            // 
            // listeToolStripMenuItem
            // 
            this.listeToolStripMenuItem.Name = "listeToolStripMenuItem";
            this.listeToolStripMenuItem.Size = new System.Drawing.Size(114, 22);
            this.listeToolStripMenuItem.Text = "Liste";
            this.listeToolStripMenuItem.Click += new System.EventHandler(this.listeToolStripMenuItem_Click);
            // 
            // frmAccueil
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(473, 404);
            this.Controls.Add(this.menuStrip1);
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.IsMdiContainer = true;
            this.Name = "frmAccueil";
            this.Text = "Auto école 68";
            this.Load += new System.EventHandler(this.frmAccueil_Load);
            this.menuStrip1.ResumeLayout(false);
            this.menuStrip1.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.MenuStrip menuStrip1;
        private System.Windows.Forms.ToolStripMenuItem fichierToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem elèveToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem nouvelÉlèveToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem leçonToolStripMenuItem1;
        private System.Windows.Forms.ToolStripMenuItem véhiculeToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem gestionToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem listeToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem quitterToolStripMenuItem;
    }
}

