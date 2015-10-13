import java.io.*;
import java.net.*;
import java.lang.*;
public class ClientTCP
{
public static void main(String args[])
{
try
{InetAddress id=InetAddress.getLocalHost();
Socket s = new Socket(id,80);
DataInputStream dis=new DataInputStream(System.in);
DataInputStream sdis=new DataInputStream(s.getInputStream());
PrintStream ps=new PrintStream(s.getOutputStream());
Boolean flag=false;
do
{System.out.println("\n1.Send\n2.Receive\n3.Exit\n");
System.out.println("Your Choice(123):");
String c=dis.readLine();
int ch=Integer.parseInt(c);
switch(ch)
{
case 1:
System.out.println("\nEnter the Message to send");
String msg=dis.readLine();
ps.println(msg.toString());
break;
case 2:int a=sdis.available();
String msgs=sdis.readLine();
if(a!=0){System.out.println("\nThe Message Received is");
System.out.println(msgs);
}
else
System.out.println("The Message is not received");
break;
case 3:
s.close();flag=true;
}
}
while(!flag);
 }
catch(Exception e)
{
}}}
