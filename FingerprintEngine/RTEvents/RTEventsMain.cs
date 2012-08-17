/**********************************************************
 * Demo for Standalone SDK.Created by Darcy on Oct.15 2009*
***********************************************************/
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using Npgsql;
using Microsoft.Win32;

namespace RTEvents
{
    public partial class RTEventsMain : Form
    {

        private DataSet ds = new DataSet();
        private DataTable dt = new DataTable();
        private static String idMesin="10";
        private NpgsqlConnection conn = new NpgsqlConnection(String.Format("Server={0};Port={1};" +
                "User Id={2};Password={3};Database={4};",
                "192.168.0.100", "5432", "postgres",
                "r4H4514", "sekolah"));
        private NpgsqlCommand command;
        String ipAddress;
        String port;
    
        public RTEventsMain()
        {
            
            InitializeComponent();
            labelMesin.Text = idMesin;
            connectMesin();
            FPlistener();
            
        }



        public void connectMesin()
        {
           
            conn.Open();
             command = new NpgsqlCommand("SELECT * FROM mesin_absensi WHERE id_mesin='"+idMesin+"'",conn);
             NpgsqlDataReader dr = command.ExecuteReader();
             while (dr.Read())
             {
                 System.Console.Write("{0}\t{1} \n", dr[0], dr[1]);
                 ipAddress = dr[1].ToString();
                 port = dr[2].ToString();
             }

     }
        public void setStatusMesin(String status) {
            string sql = "UPDATE mesin_absensi SET status_mesin='"+status+"' WHERE id_mesin='"+idMesin+"'";
            command = new NpgsqlCommand(sql, conn);
            command.ExecuteReader();

        }
    
        public void FPlistener(){          
            int idwErrorCode = 0;

            bIsConnected = axCZKEM1.Connect_Net(ipAddress, Convert.ToInt32(port));
            setStatusMesin("1");
            if (bIsConnected == true)
            {
                lblState.Text = "Current State:Connected";
                iMachineNumber = 1;//In fact,when you are using the tcp/ip communication,this parameter will be ignored,that is any integer will all right.Here we use 1.
                if (axCZKEM1.RegEvent(iMachineNumber, 65535))//Here you can register the realtime events that you want to be triggered(the parameters 65535 means registering all)
                {
                    this.axCZKEM1.OnAttTransactionEx += new zkemkeeper._IZKEMEvents_OnAttTransactionExEventHandler(axCZKEM1_OnAttTransactionEx);

                }
            }
            else
            {
                axCZKEM1.GetLastError(ref idwErrorCode);
                MessageBox.Show("Unable to connect the device,ErrorCode=" + idwErrorCode.ToString(), "Error");
            }
            Cursor = Cursors.Default;
        }

        //Create Standalone SDK class dynamicly.
        public zkemkeeper.CZKEMClass axCZKEM1 = new zkemkeeper.CZKEMClass();

        /********************************************************************************************************************************************
        * Before you refer to this demo,we strongly suggest you read the development manual deeply first.                                           *
        * This part is for demonstrating the communication with your device.There are 3 communication ways: "TCP/IP","Serial Port" and "USB Client".*
        * The communication way which you can use duing to the model of the device.                                                                 *
        * *******************************************************************************************************************************************/
        #region Communication
        private bool bIsConnected = false;//the boolean value identifies whether the device is connected
        private int iMachineNumber = 1;//the serial number of the device.After connecting the device ,this value will be changed.
        #endregion
        //If your device supports the TCP/IP communications, you can refer to this.
        //when you are using the tcp/ip communication,you can distinguish different devices by their IP address.
        /*************************************************************************************************
        * Before you refer to this demo,we strongly suggest you read the development manual deeply first.*
        * This part is for demonstrating the RealTime Events that triggered  by your operations          *
        **************************************************************************************************/
        #region RealTime Events

        //If your fingerprint(or your card) passes the verification,this event will be triggered
        private void axCZKEM1_OnAttTransactionEx(string sEnrollNumber, int iIsInValid, int iAttState, int iVerifyMethod, int iYear, int iMonth, int iDay, int iHour, int iMinute, int iSecond, int iWorkCode)
        {
            DateTime dt = DateTime.Now;
            String date =String.Format("{0:yyyy-MM-dd}",dt);
            String time = String.Format("{0:HH:mm:ss}",dt);
            String sql="INSERT INTO retreive_absen VALUES ('" + sEnrollNumber + "','" + time + "','" + date + "')";
            System.Console.WriteLine(sql);
            command = new NpgsqlCommand(sql,conn);
            command.ExecuteReader();
            
        }


        //After function GetRTLog() is called ,RealTime Events will be triggered. 
        //When you are using these two functions, it will request data from the device forwardly.
        private void rtTimer_Tick(object sender, EventArgs e)
        {
            if (axCZKEM1.ReadRTLog(iMachineNumber))
            {
                while (axCZKEM1.GetRTLog(iMachineNumber))
                {
                    ;
                }
            }
        }

        #endregion

        private void lbRTShow_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void RTEventsMain_Load(object sender, EventArgs e)
        {

        }

        private void RTEventsMain_FormClosing(object sender, FormClosingEventArgs e)
        {
            setStatusMesin("0");
            conn.Close();
        }

        private void RTEventsMain_FormClosed(object sender, FormClosedEventArgs e)
        {
            setStatusMesin("0");
            conn.Close();
        }


    }
}
