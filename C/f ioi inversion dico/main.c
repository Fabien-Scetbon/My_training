#include <stdio.h>
#include <string.h>
#include <ctype.h>

int main()
{
   int nbMots;
   scanf("%d" , &nbMots);

   char francais[nbMots][51];
   char anglais[nbMots][110];

   int i;
   for(i = 0 ; i < nbMots ; i++)
   {
      scanf(" %s", francais[i]);
      scanf(" %s", anglais[i]);
      strcat(anglais[i] , " ");
      strcat(anglais[i] , francais[i]);
   }

   i=0;
   while(i < nbMots - 1)
   {
       if(strcmp(anglais[i] , anglais[i + 1])>0 )
       {
           char tampon[110];
           strcpy(tampon , anglais[i]);
           strcpy(anglais[i] , anglais[i + 1]);
           strcpy(anglais[i + 1] , tampon) ;

           if(i > 0) i--;
           tampon[0]='\0';
       }
       else
       {
           i++;
       }
   }

  for(int i = 0; i < nbMots ; i++)
   {
      printf("%s\n", anglais[i]);
   }
   return 0;
}











