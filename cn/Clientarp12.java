import java.io.*;
import java.net.*;
import java.util.*;
class Clientarp12
{
public static void main(String args[])
{
try
{
DatagramSocket client = new DatagramSocket();
InetAddress addr= InetAddress.getByName("127.0.0.1");
byte[]sendbyte = new byte[1024];
byte[]receivebyte = new byte[1024];
BufferedReader in = new BufferedReader(new InputStreamReader(System.in));
System.out.println("Enter the Physical address ");
String str = in.readLine();
sendbyte=str.getBytes();
DatagramPacket sender = new DatagramPacket(sendbyte,sendbyte.length,addr,1309);
client.send(sender);
DatagramPacket receiver = new DatagramPacket(receivebyte,receivebyte.length);
client.receive(receiver);
String s = new String(receiver.getData());
System.out.println("The logical address is :"+s.trim());
}
catch(Exception e)
{
System.out.println(e);
}
}
}

