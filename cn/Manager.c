
#include<stdio.h>
#include<sys/types.h>
#include<netinet/in.h>

main()
{
int csd,cport,len,i;

char sendmsg[20],rcvmsg[100],rmsg[100],oid[100]; struct sockaddr_in servaddr;

printf("Enter the port\n"); scanf("%d",&cport); csd=socket(AF_INET,SOCK_STREAM,0);

if(csd<0)
printf("Can't Create\n");
else

printf("Scocket is Created\n"); servaddr.sin_family=AF_INET; servaddr.sin_addr.s_addr=htonl(INADDR_ANY); servaddr.sin_port=htons(cport);

if(connect(csd,(struct sockaddr*)&servaddr,sizeof(servaddr))<0) 
printf("Can't Connect\n");

else
printf("Connected\n");
printf("\n 1.TCP Connection\n"); printf("\n 2. System \n");

printf("Enter the number for the type of informtion needed....\n"); 
scanf("%d",&i);

if(i==1)
{

printf("Enter the Object ID for Client\n"); scanf("%s",oid);

send(csd,oid,100,0);
recv(csd,rmsg,100,0);
printf("\n The window size of %s is %s",oid,rmsg);
}
else

{

printf("\nEnter the Object ID for the System\n"); scanf("%s",oid);

send(csd,oid,100,0);
recv(csd,rmsg,100,0);

printf("\nThe Manufacturing date for %s is %s",oid,rmsg); recv(csd,rmsg,100,0);

printf("\nThe time of Last Utilization for %s is %s",oid,rmsg);
}
}
