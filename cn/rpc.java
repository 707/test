import java.rmi.*;
import java.lang.Math.*;
import java.rmi.server.*;
public class rpc extends UnicastRemoteObject implements ucet
{
public rpc()throws Exception
{
}
public int function(int a,int b)throws RemoteException
{
int m;
m=(a*a)+(b*b)+(2*a*b);
return m;
}
public int power(int a,int b)throws RemoteException
{
int m=(int)Math.pow(a,b);
return m;
}
public double log(int a)throws RemoteException
{
return(Math.log(a));
}
}
