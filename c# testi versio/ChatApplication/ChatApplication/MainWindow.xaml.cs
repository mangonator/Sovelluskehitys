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
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Net;
using System.IO;
	
		 
	

namespace ChatApplication
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public string caller;
        public RadioButton[] button_array = new RadioButton[10];
        public MainWindow()
        {
            InitializeComponent();
            //WhosOnline();

            //this.Hide();


            
            //LoginScreen loginScreen = new LoginScreen();
            //loginScreen.Show();
            
        }
        public string GetPublicIP()
        {
            string direction = "";
            WebRequest request = WebRequest.Create("http://checkip.dyndns.org/");
            using (WebResponse response = request.GetResponse())
            using (StreamReader stream = new StreamReader(response.GetResponseStream()))
            {
                direction = stream.ReadToEnd();
            }

            //Search for the ip in html
            int first = direction.IndexOf("Address: ") + 9;
            int last = direction.LastIndexOf("</body>");
            direction = direction.Substring(first, last - first);

            return direction;
        }
        public void WhosOnline()
        {
            //lukee tekstitiedoston
            int counter = 0;
            string user;

            //RadioButton[] button_array = new RadioButton[10];
            System.IO.StreamReader file = new System.IO.StreamReader("c:\\Users\\Jispa\\Dropbox\\dropboxchatfiles\\WhosOnline.txt");
            while ((user = file.ReadLine()) != null)
            {
                
                if (user != caller)
                {
                    button_array[counter] = new RadioButton();
                    button_array[counter].Content = user;
                    Online_List.Children.Add(button_array[counter]);
                    counter++;
                }


            }
            file.Close();
        }
       
        public void Login(string username)
        {
            caller = username;
            this.Title = "Logged in as " + username;
            WhosOnline();
        }

        private void mainWindow_Closed(object sender, EventArgs e)
        {
            Application.Current.Shutdown();
        }

        private void Call_button_Click(object sender, RoutedEventArgs e)
        {
            string receiver;
            string caller_IP = GetPublicIP();
            foreach (RadioButton b in button_array)
	        {
		        if (b == null)
                {
                    continue;
                }
                else
                {
                    if (b.IsChecked == true)
                    {
                        receiver = b.Content.ToString();
                        VoiceChat voiceChat = new VoiceChat();
                        voiceChat.Show();
                        voiceChat.Call(caller, receiver, caller_IP);
                    }
                    else
                    {
                        continue;
                    }
                }
	        }
        
            
            


            //receiver = Online_list.
            //receiver = mainWindow.Online_list.Items.CurrentItem.ToString();
            
        }
    }
}
