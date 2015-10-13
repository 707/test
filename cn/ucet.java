import java.rmi.*;
public interface ucet extends Remote
{
public int function(int a,int b)throws RemoteException;
public int power(int a,int b)throws RemoteException;
public double log(int a)throws RemoteException;
}

