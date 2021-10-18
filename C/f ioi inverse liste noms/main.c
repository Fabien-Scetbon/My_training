#include <stdio.h>
#include <string.h>
#include <ctype.h>

int main()
{
   int nbLivres;
   scanf("%d" , &nbLivres);

   char lignes[nbLivres][101];

   for(int i = 0; i < nbLivres ; i++)
   {
      scanf(" %[^\n]", lignes[i]);
   }

   for(int i = nbLivres - 1; i >=0 ; i--)
   {
      printf("%s\n", lignes[i]);
   }

   return 0;
}
