using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace SqueletteAutoEcole
{
    public partial class frmVehicule : Form
    {
        public frmVehicule()
        {
            InitializeComponent();
            
        }

        private void frmVehicule_Load(object sender, EventArgs e)
        {
            // TODO: cette ligne de code charge les données dans la table 'dSAutoEcole.Vehicule'. Vous pouvez la déplacer ou la supprimer selon les besoins.
            this.vehiculeTableAdapter.Fill(this.dSAutoEcole.Vehicule);

        }


        private void Sauver_Click(object sender, EventArgs e)
        {
            try
            {
                bdgVehicule.EndEdit();
                vehiculeTableAdapter.Update(dSAutoEcole.Vehicule);
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void bindingNavigator1_ItemClicked(object sender, ToolStripItemClickedEventArgs e)
        {
            try
            {
                bdgVehicule.EndEdit();
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
                bdgVehicule.CancelEdit();
            }
        }

        private void bindingNavigator1_RefreshItems(object sender, EventArgs e)
        {

        }
    }
}
