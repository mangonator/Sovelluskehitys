using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace ChatApplication
{
    /// <summary>
    /// Interaction logic for LoginScreen.xaml
    /// </summary>
    public partial class LoginScreen : Window
    {
        
        public LoginScreen()
        {
            InitializeComponent();
            Username_textbox.Focus();
        }

        private void Login_button_Click(object sender, RoutedEventArgs e)
        {
            string name;
            name = Username_textbox.Text;
            if (string.IsNullOrWhiteSpace(name))
            {
                return;
            }
            else 
            {
                MainWindow mainWindow = new MainWindow();
                this.Hide();
                mainWindow.Login(name);
                mainWindow.Show();
            }
            
        }

        private void Exit_button_Click(object sender, RoutedEventArgs e)
        {
            this.Close();

        }

    }
}
