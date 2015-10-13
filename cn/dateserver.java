import java.net.*;
import java.io.*;
import java.util.*;
class Dateserver{
public static void main(String args[]){
ServerSocket ss;
Socket s;
PrintStream ps;
DataInputStream dis;
String inet;
try{
ss=new ServerSocket(8020);
while(true){
s=ss.accept();
ps=new PrintStream(s.getOutputStream());
Date d=new Date();
ps.println(d);
dis=new DataInputStream(s.getInputStream());
inet=dis.readLine();
System.out.println("The Client System Address Is:"+inet);
ps.close();
}}
catch(IOException e)
{
System.out.println("The exception is:"+e);
}}}
