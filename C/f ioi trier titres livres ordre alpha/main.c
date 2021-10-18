#include <stdio.h>
#include <string.h>
#include <ctype.h>

int main()
{
   int nbLivres;
   int i = 0;
   scanf("%d" , &nbLivres);
   char livres[nbLivres][101];

   for(int i = 0; i < nbLivres ; i++)
   {
      scanf(" %[^\n]", livres[i]);
   }

   while(i < nbLivres -1)
   {
       if(strcmp(livres[i] , livres[i + 1])>0 )
       {
           char tampon[101];
           strcpy(tampon , livres[i]);
           strcpy(livres[i] , livres[i + 1]);
           strcpy(livres[i + 1] , tampon) ;

           if(i > 0) i--;
           tampon[0]='\0';
       }
       else
       {
           i++;
       }
   }

   for(int i = 0; i < nbLivres ; i++)
   {
      printf("%s\n", livres[i]);
   }
   return 0;
}
