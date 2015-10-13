import java.net.*;
import java.io.*;
public class EClient
{
	public static void main(String arg[])
	{
		Socket c=null;
		String line;
		DataInputStream is,is1;
		PrintStream os;
		try
		{          
                                    InetAddress ia = InetAddress.getLocalHost();
			c=new Socket(ia,9000);
		}
		catch(IOException e)	
		{
			System.out.println(e);
		}
		try
		{
			os=new PrintStream(c.getOutputStream());
			is=new DataInputStream(System.in);
			is1=new DataInputStream(c.getInputStream());
			while(true)
			{
			System.out.println("Client:");
				line=is.readLine();
				os.println(line);
				System.out.println("Server:" + is1.readLine());}}	
		catch(IOException e)
		{
		System.out.println("Socket Closed!");}}}

