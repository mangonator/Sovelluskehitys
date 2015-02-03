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
//using System.ComponentModel;
//using System.Data;
using System.Drawing;
using Microsoft.DirectX.DirectSound;
using System.IO;
using System.Threading;
using System.Net.Sockets;
using System.Net;
using g711audio;

namespace ChatApplication
{
    /// <summary>
    /// Interaction logic for VoiceChat.xaml
    /// </summary>
    public partial class VoiceChat : Window
    {
        public VoiceChat()
        {
            InitializeComponent();
        }
        public void Call(string Caller, string Receiver, string Caller_IP)
        {
            Caller_id.Content = Caller +"   "+ Caller_IP;

            Receiver_id.Content = Receiver;
        }
    }
}
