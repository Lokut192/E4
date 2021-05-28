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
    public partial class frmListeVehicules : Form
    {
        public frmListeVehicules()
        {
            InitializeComponent();
        }


        private void frmListeVehicules_Load(object sender, EventArgs e)
        {
            // TODO: cette ligne de code charge les données dans la table 'dSAutoEcole.Vehicule'. Vous pouvez la déplacer ou la supprimer selon les besoins.
            this.vehiculeTableAdapter.Fill(this.dSAutoEcole.Vehicule);


        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            try
            {
                VehiculeBindingSource.EndEdit();
            }
            catch(Exception ex)
            {
                MessageBox.Show(ex.Message);
                VehiculeBindingSource.CancelEdit();
            }
        }

        private void btnSauvegarder_Click(object sender, EventArgs e)
        {
            try
            {
                vehiculeTableAdapter.Update(dSAutoEcole.Vehicule);
            }catch(Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void btnAnnuler_Click(object sender, EventArgs e)
        {
            dSAutoEcole.Vehicule.RejectChanges();
        }
    }
}
