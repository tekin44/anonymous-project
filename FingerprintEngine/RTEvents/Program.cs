using System;
using System.Collections.Generic;
using System.Windows.Forms;

namespace RTEvents
{
    static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            FingerprintMachine fap = new FingerprintMachine();
            //fap.Connect();
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new RTEventsMain());
        }
    }
}