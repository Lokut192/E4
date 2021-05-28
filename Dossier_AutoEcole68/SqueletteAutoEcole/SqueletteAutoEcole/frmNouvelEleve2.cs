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
    public partial class frmNouvelEleve2 : Form
    {
        public frmNouvelEleve2()
        {
            InitializeComponent();
            for (int i = 5; i < 40; i += 5)
            {
                cmbForfait.Items.Add(i);
            }
            //On met la date par défaut dans la saisie de la date
            txtDateInscription.Text = DateCalendrier.SelectionStart.ToShortDateString();
        }

        private void frmNouvelEleve2_Load(object sender, EventArgs e)
        {
           
        }

        private void btnSauvegarder_Click(object sender, EventArgs e)
        {
            //On verifie d'abord que tous les champs sont remplis
            if (!string.IsNullOrEmpty(txtNom.Text) && !string.IsNullOrEmpty(txtPrenom.Text) && !string.IsNullOrEmpty(txtAdresse.Text) && !string.IsNullOrEmpty(txtCP.Text) && !string.IsNullOrEmpty(txtVille.Text) && !string.IsNullOrEmpty(cmbForfait.Text))
            {
                //On va même vérifier que les champs ne sont pas remplis d'espaces blancs
                if (!string.IsNullOrWhiteSpace(txtNom.Text) && !string.IsNullOrWhiteSpace(txtPrenom.Text) && !string.IsNullOrWhiteSpace(txtAdresse.Text) && !string.IsNullOrWhiteSpace(txtCP.Text) && !string.IsNullOrWhiteSpace(txtVille.Text))
                {
                    string nom = txtNom.Text;
                    DateTime? dt = Convert.ToDateTime(txtDateInscription.Text);
                    string prenom = txtPrenom.Text;
                    string cp = txtCP.Text;
                    string ville = txtVille.Text;
                    short? forfait = Convert.ToInt16(cmbForfait.SelectedItem);
                    string adresse = txtAdresse.Text;
                    try
                    {
                        //on éxecute la procédure stockée en lui donnant les paramètres
                        queriesTableAdapter1.pEleve_INSERT(nom, prenom, dt, adresse, cp, ville, forfait);
                        MessageBox.Show("Nouvel élève enregistré");
                        txtNom.Text = "";
                        txtPrenom.Text = "";
                        txtAdresse.Text = "";
                        txtDateInscription.Text = "";
                        cmbForfait.SelectedIndex = -1;
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show(ex.Message);
                    }
                }
            }
        }

        private void monthCalendar_DateChanged(object sender, DateRangeEventArgs e)
        {
            txtDateInscription.Text = DateCalendrier.SelectionStart.ToShortDateString();
        }
    }
}
