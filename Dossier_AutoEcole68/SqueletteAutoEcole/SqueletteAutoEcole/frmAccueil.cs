using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace SqueletteAutoEcole
{
    public partial class frmAccueil : Form
    {
        public frmAccueil()
        {
            InitializeComponent();
        }

        private void gestionToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frmVehicule feuille = new frmVehicule();
            feuille.MdiParent = this;
            feuille.Show();
        }

        private void listeToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frmListeVehicules feuille = new frmListeVehicules();
            feuille.MdiParent = this;
            feuille.Show();
        }

        private void nouvelÉlèveToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frmNouvelEleve2 feuille = new frmNouvelEleve2();
            feuille.MdiParent = this;
            feuille.Show();
        }
        

        private void fichierToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        private void menuStrip1_ItemClicked(object sender, ToolStripItemClickedEventArgs e)
        {

        }

        private void QuitterToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void frmAccueil_Load(object sender, EventArgs e)
        {

        }
    }
}
