#include<stdio.h>
#include<math.h>
#include <stdlib.h>
#include <string.h>
int x=2,req,i,hostbit,h,result,n,a;
int num, binary_num, decimal_num = 0, base = 1, rem;  
int ba[4]={255,0,0,0};
int bb[4]={255,255,0,0};
int bc[4]={255,255,255,0};

char b4[8];
int b[4];
char clas;
void printarray(){
	int size = 4;
	printf("\n");
	for(i=0;i<4;i++){
		printf("%d.",b[i]);
	}
}
int A(int req,char clas){
	for(i=1;i<=100;i++){
		int result = pow(x,i);
		result = result - 2;
		if(result>=req){
			printf("No. of HostBit :%d\n",i);
			break;
		}
	}
			hostbit=24;
			b[0]=ba[0];
			b[1]=ba[1];
			b[2]=ba[2];
			b[3]=ba[3];
	int dc;
	h=hostbit-i;
	printf("No. of Netbit :%d\n",h);
	int ar[24];
	for(i=0;i<24;i++){
		if(h!=0){
			ar[i]=1;
			h--;
		}
		else{
			ar[i]=0;
		}
	}
	/*for(i=0;i<16;i++)
		printf("%d",ar[i]);*/
	int j;
	int i, k = 0;
    for (i = 8; i < 16; i++)
        k = 10 * k + ar[i];
	//printf("\n%d",k);
	binary_num = n;
	num = k;
	
	while(num>0){
		rem = num % 10;
		decimal_num = decimal_num + rem *base;
		num = num/10;
		base = base * 2;
		if(decimal_num >= 255){
			//printf("Invalid");
			break;
		}
	}
			b[2]=decimal_num;
			//printf("%d",decimal_num);
	k = 0;
	num=binary_num=decimal_num=rem=0;
	for (i = 16; i < 24; i++)
        k = 10 * k + ar[i];
	//printf("\n%d",k);
	binary_num = n;
	num = k;
	
	while(num>0){
		rem = num % 10;
		decimal_num = decimal_num + rem *base;
		num = num/10;
		base = base * 2;
		if(decimal_num >= 255){
			//printf("Invalid");
			break;
		}
	}
			b[3]=decimal_num;
			
	k = 0;
	num=binary_num=decimal_num=rem=0;
	base = 1;
    for (i = 0; i < 8; i++)
        k = 10 * k + ar[i];
	//printf("\n%d",k);
	binary_num = n;
	num = k;
	while(num>0){
		rem = num % 10;
		decimal_num = decimal_num + rem *base;
		num = num/10;
		base = base * 2;
		if(decimal_num >= 255){
			//printf("Invalid");
			break;
		}
	}
			b[1]=decimal_num;
			//printf("%d",decimal_num);
	printarray();	
	}
int main()
{
	printf("Enter a class: ");
	scanf("%c",&clas);
	printf("Enter Host requierment:");
	scanf("%d",&req);
	switch(clas){
		case 'A':
			A(req,clas);
			break;
		}
	return 0;
}

