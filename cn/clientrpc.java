import java.rmi.*;
import java.io.*;
import java.rmi.server.*;
public class clientrpc
{
public static void main(String arg[])
{
try
{
String serverurl="rmi://localhost/serverrpc";
ucet ob=(ucet) Naming.lookup(serverurl);
int r=ob.function(10,5);
System.out.println("the answer of(a+b)^2 is:"+r);
int t =ob.power(10,5);
System.out.println("the answer of(a)^(b) is:"+t);
double d=ob.log(10);
System.out.println("the log value of the given number "+10+" is :"+d);
}
catch(Exception e)
{
System.out.println("error.."+e.getMessage());
}
}
}
