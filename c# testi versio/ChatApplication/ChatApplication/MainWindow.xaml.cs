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
//using System.Windows.Shapes;
using System.Net;
using System.IO;
using MySql.Data;
using MySql.Data.MySqlClient;

	
		 
	

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
            //GetDropBoxPath();

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

        public static string GetDropBoxPath()
        {
            var appDataPath = Environment.GetFolderPath(
                                               Environment.SpecialFolder.ApplicationData);
            var dbPath = Path.Combine(appDataPath, "Dropbox\\host.db");

            if (!File.Exists(dbPath))
                return null;

            var lines = File.ReadAllLines(dbPath);
            var dbBase64Text = Convert.FromBase64String(lines[1]);
            var folderPath = Encoding.UTF8.GetString(dbBase64Text);

            return folderPath;
        }
        public void WhosOnline(string operation)
        {
            //lukee tekstitiedoston
            int counter = 0;
            string user;

            //RadioButton[] button_array = new RadioButton[10];
            //System.IO.StreamReader file = new System.IO.StreamReader("c:\\Users\\Jispa\\Dropbox\\dropboxchatfiles\\WhosOnline.txt");
            string filepath = GetDropBoxPath();
            System.IO.StreamReader file = new System.IO.StreamReader(filepath + "\\DB\\WhosOnline.txt");
            //System.IO.StreamReader file = new System.IO.StreamReader("c:\\Users\\Jispa\\Dropbox\\dropboxchatfiles\\WhosOnline.txt");
            
            switch (operation)             
            { 
                case "Read":
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
                    break;
                case "Delete":
                    while ((user = file.ReadLine()) != null)
                    {
                        if (user == caller)
                        {
                            
                        }
                    }
                    break;
                    

            }

            
        }
       
        public void Login(string username)
        {
            caller = username;
            this.Title = "Logged in as " + username;
            WhosOnline("Read");
            string filepath = GetDropBoxPath();
            System.IO.StreamWriter file = new System.IO.StreamWriter(filepath + "\\DB\\WhosOnline.txt", true);
            file.WriteLine(caller);
            file.Close();
            
        }

        public static string Indent(int count)
        {
            return "".PadLeft(count);
        }
        public void WriteToFile(string line, string filename)
        {
            //kirjoittaa tekstitiedostoon
            string Now = DateTime.Now.ToString("<dd.MM.yy klo: HH:mm:ss >");
            //string Now = "<" +DateTime.Now.ToShortDateString() + " klo: " + DateTime.Now.ToShortTimeString() + ">";
            string date = Now.ToString() + Indent(3);
            string filepath = GetDropBoxPath();
            System.IO.StreamWriter file = new System.IO.StreamWriter(filepath + filename, true);
            file.WriteLine(date + caller + ": " +line);
            file.Close();

        }

        public void ReadFile()
        {
            //lukee tekstitiedoston
            int counter = 0;
            string line;
            string filepath = GetDropBoxPath();
            System.IO.StreamReader file = new System.IO.StreamReader(filepath +"\\DB\\chatlog.txt");
            while ((line = file.ReadLine()) != null)
            {
                Chat_textbox.AppendText(line.Substring(25) + Environment.NewLine);
                counter++;
                Chat_textbox.ScrollToEnd();


            }
            file.Close();



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

        private void Send_button_Click(object sender, RoutedEventArgs e)
        {
            string line = Input_textbox.Text;
            string filename = "\\DB\\chatlog.txt";
            WriteToFile(line,  filename);
            Input_textbox.Text = null;
            Chat_textbox.Text = null;
            ReadFile();
        }

        private void Chat_textbox_Loaded(object sender, RoutedEventArgs e)
        {
            ReadFile();
            Input_textbox.Focus();
        }
    }
}
