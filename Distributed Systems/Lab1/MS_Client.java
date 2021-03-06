/*Name: Rachana Naganagouda Patil
 * Student Id: 1001644227
 */

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;
import java.util.ArrayList;

/*
 * class for MS_Client starts below
 * Reference:- https://www.dreamincode.net/forums/topic/259777-a-simple-chat-program-with-clientserver-gui-optional/ 
 * (Base code)
 */
public class MS_Client {
		//Initialize variable to read and write in the socket 
		private ObjectInputStream in;	      	
		private ObjectOutputStream out;		
		// Initialize the socket
		private Socket socket;
		// ClientGUI object
		private MS_ClientGUI cg;
		// Initialize array list dup
		public ArrayList<String> dup = new ArrayList<String>();
		// Initialise the strings server and username
		private String server, username;
		
		/*
		 * Getters and Setters for getting the username of the clients
		 */
		public String getUsername() 
		{
			return username;
		}

		public void setUsername(String username) 
		{
			this.username = username;
		}

		
		/*
		 * Client Constructor with parameters
		 * inputs: server, username, client GUI instance
		 * outputs: None
		 */
		MS_Client(String server, String username, MS_ClientGUI cg) {
			this.server = server;
			this.username = username;
			this.cg = cg;
		}
		
		/*
		 * To start the Client process
		 * input: None
		 * Output: boolean value
		 */
		public boolean start() {
			
			try {
				socket = new Socket(server,1201);     // creating new socket object with server address and port number 1201
			} 
			catch (Exception e1) {
				display("Error connectiong to server:" + e1);   // if exception message is displayed on client text area.
				} 
			
			String msg = "Connection has been accepted " + socket.getInetAddress() + ":" + socket.getPort();
			display(msg);        // To display message on the Client GUI
		
			// Creating both input and output Data Stream 
			try {
				in  = new ObjectInputStream(socket.getInputStream());
				out = new ObjectOutputStream(socket.getOutputStream());
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			// Creates the Thread to listen from the server 
			new ListenFromServer().start();
			try
			{
				out.writeObject(username);         // writes the username of the client on the socket and sends to server  
			}
			catch (IOException e) {
				System.out.println("writing");
				disconnect();                    // disconnect() execution if not able to write on the socket
				return false;
			}
			return true;                                 // Success we inform the Client that it worked
		}

		/*
		 * display method to append the message on Client GUI
		 * input: String 
		 * ouput: None
		 */
		private void display(String msg) 
		{
			cg.display(msg + "\n");		
		}
		
		/*
		 * sendMessage method writes the message on the socket 
		 * input: String array
		 * output: None
		 */
		void sendMessage(String[] message) {
			try {
				out.writeObject(message);
			}
			catch(IOException e) {
				System.out.println("write");
			}
		}

		/*
		 * Disconnect function closes all the Input/Output streams if error has occurred
		 */
		private void disconnect() {
			try { 
				if(in != null) in.close();
			}
			catch(Exception e) {
				
			} 
			try {
				if(out != null) out.close();
			}
			catch(Exception e) {
				
			} 
	        try{
				if(socket != null) socket.close();
			}
			catch(Exception e) {
				
			} 
		}
		
		/*
		 * ListenFromServer is the Class that waits for the message from the Server
		 */
		class ListenFromServer extends Thread 
		{
			public void run() 
			{
				while(true) 
				{
					try 
					{
						// Response Headers
						String[] response_message= new String[5];
						response_message = (String[])in.readObject();        // Reads the message from the server
						// if response consists of message 
						if(response_message[1].substring(14).trim().contains("message"))
						{
							cg.display(response_message[4]);       // append on the client GUI   
						}
						else
						{
							cg.update_comboBox(response_message);  // if it consists of client username for comboBox, update the dropbox
						}
					}
					catch(IOException e) {
						//e.printStackTrace();
						System.out.println("reading");
						if(cg != null) 
							//cg.connectionFailed();
						break;
					}
			
					catch(ClassNotFoundException e2) {
					}
				}
			}
		}
	}
