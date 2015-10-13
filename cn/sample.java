import java.net.*;
import java.rmi.*;
public class Slidesender
{
public static void main(String a[])throws Exception
{
ServerSocket ser=new ServerSocket(10);
Socket s=ser.accept();
DataInputStream in=new DataInputStream(System.in);
DataInputStream in1=new DataInputStream(s.getInputStream());
String sbuff[]=new String[8];
PrintStream p;
int sptr=0,sws=8,nf,ano,i;
String ch;
do
{
p=new PrintStream(s.getOutputStream());
System.out.print("Enter no of frames");
nf=Integer.parseInt(in.readLine());
p.println(nf);
if(nf<=sws-1)
{
System.out.println("Enter"+nf+"Messages to b send\n");
for(i=1;i<=nf;i++)
{
sbuff[sptr]=in.readLine();
p.println(sbuf[sptr]);
sptr=++sptr%8;
}
sws=nf;
System.out.print("Acknowledgment received");
ano=Integer.parseInt(in1.readLine());
System.out.println("ofr"+ano+"frames");
sws+=nf;
}
else
{
System.out.println("The no of frames exceeds window size");
break;
}
System.out.print("\nDo you wants to send some more frames");
ch=in.readLine();
p.println(ch);
}
while(ch.equals("yes"));
s.close();
}
}}
System.out.print("\nDo you wants to send some more frames");
ch=in.readLine();
p.println(ch);
}
while(ch.equals("yes"));
s.close();
}
}
