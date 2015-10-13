#include<stdio.h>
#include<sys/types.h>
#include<netinet/in.h>
#include<string.h>

main()
{

int i,sd,sd2,nsd,clilen,sport,len; char sendmsg[20],recvmsg[100];

char oid[5][10]={"client1","client2","client3","cleint4","client5"}; char wsize[5][5]={"5","10","15","3","6"};

struct sockaddr_in servaddr,cliaddr; printf("I'm the Agent - TCP Connection\n"); printf("\nEnter the Server port"); printf("\n_____________________\n"); scanf("%d",&sport); sd=socket(AF_INET,SOCK_STREAM,0);

if(sd<0)
printf("Can't Create \n");
else

printf("Socket is Created\n"); servaddr.sin_family=AF_INET; servaddr.sin_addr.s_addr=htonl(INADDR_ANY); servaddr.sin_port=htons(sport);

sd2=bind(sd,(struct sockaddr*)&servaddr,sizeof(servaddr)); if(sd2<0)

printf(" Can't Bind\n");
else
printf("\n Binded\n");

listen(sd,5);
clilen=sizeof(cliaddr);
nsd=accept(sd,(struct sockaddr*)&cliaddr,&clilen);

if(nsd<0)
printf("Can't Accept\n");
else
printf("Accepted\n");

recv(nsd,recvmsg,100,0); for (i=0;i<5;i++)

{
if(strcmp(recvmsg,oid[i])==0)
{
send(nsd,wsize[i],100,0);
break;
}
}
}
