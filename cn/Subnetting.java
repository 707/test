import java.util.Scanner;
class Subnet
{
public static void  main(String args[])
{
Scanner sc=new Scanner(System.in);
System.out.println("Enter the ip adddress");
String ip=sc.nextLine();
String split_ip[]=ip.split("\\.");
String split_bip[]=new String[4];
String bip="";
for(int i=0;i<4;i++)
{
split_bit[i]=appendZeros(Integer.toBinaryString(Integer.parseInt(split_ip[i])));
bip+=split_bip[i];
}
System.out.println("IP in binary is "+bip);
System.out.print("Enter the numnber of address:");
int n=sc.nectInt();
int bits=(int)Math.ceil(Math.log(n)/Math.log(2));
System.out.println("Number of bits required for address="+bits);
int mask=32-bits;
System.out.println("The subnet mask is="+mask);
for(int i=0;i<32;i++)

fbip[i]=(int)bip.charAt(i)-48;
fbip[i]&=0;
String fip[]={"","","",""};
for(int i=0;i<32;i++)
fip[i/8]=new String(fip[i/8]+fbip[i]);
System.out.print("First address is=");
for(int i=o;i<4;i++)
{
System.out.print(Integer.parseInt(fip[i],2));
}
System.out.println();
int lbip[]=new int[32];
for(int i=0;i<32;i++)
lbip[i]=(int)bip.charAt(i)-48;
for(int=3;i>31-bits;i_)
lbip[i]=1;
String lip={"","","",""};
for(int i=0;i<32;i++)
lip[i/8]=new String(lip[i/8]+lbip[i]);
System.out.print("last address is+");
for(int i=0;i<4;i++)
{
System.out.print(Integer.parseInt(lip[i],2));
if(i!=3)System.out.print(".");
}
System.out.println();
}
Static String ppendZeros(String s)
{
String temp=new String("00000000");
return temp.substring(s.lenth())+s;
}
}



