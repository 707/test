import java.io.*;
import java.net.*;
class tcpchatserver
{
public static void main(String args[])throws Exception
{	
PrintWriter toClient;
BufferedReader fromUser, fromClient;
try
{
ServerSocket Srv = new ServerSocket(5555);
System.out.print("\nServer started\n");
Socket Clt = Srv.accept();
System.out.println("Client connected");
toClient = new PrintWriter(new BufferedWriter(new OutputStreamWriter(Clt.getOutputStream())), true);
fromClient = new BufferedReader(new InputStreamReader(Clt.getInputStream()));
fromUser = new BufferedReader(new InputStreamReader(System.in));
String CltMsg, SrvMsg;
while(true)
{
CltMsg= fromClient.readLine();
if(CltMsg.equals("end"))
break;
else
{
System.out.println("\nServer <<< " +CltMsg);
System.out.print("Message to Client : ");
SrvMsg = fromUser.readLine();
toClient.println(SrvMsg);
}
}
System.out.println("\nClient Disconnected");
fromClient.close();
toClient.close();
fromUser.close();
Clt.close();
Srv.close();
}
catch (Exception E)
{
System.out.println(E.getMessage());
}
}
}
