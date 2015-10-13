
#include<stdio.h>
#include<sys/types.h>

#include<netinet/in.h>
#include<string.h>

main()
{

int i,sd,sd2,nsd,clilen,sport,len; char sendmsg[20],recvmsg[100];

char oid[5][10]={"System1","System2","System3","System4","System5"}; char mdate[5][15]={"1-10-095","10-03-08","14.03.81","11.07.07","17.12.77"}; char time[5][15]={"9am","10pm","11am","12.30pm","11.30am"};

struct sockaddr_in servaddr,cliaddr; printf("Enter the Server port"); printf("\n_____________________\n"); scanf("%d",&sport); sd=socket(AF_INET,SOCK_STREAM,0);

if(sd<0)
printf("Can't Create \n");
else

printf("Socket is Created\n"); servaddr.sin_family=AF_INET; servaddr.sin_addr.s_addr=htonl(INADDR_ANY); servaddr.sin_port=htons(sport);

sd2=bind(sd,(struct sockaddr*)&servaddr,sizeof(servaddr));

if(sd2<0)
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

recv(nsd,recvmsg,100,0);

for(i=0;i<5;i++)
{
if(strcmp(recvmsg,oid[i])==0)
{
send(nsd,mdate[i],100,0);
send(nsd,time[i],100,0);

break;
}
}
}

