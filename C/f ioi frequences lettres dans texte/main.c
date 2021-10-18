#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
#include <math.h>

int main()
{
   double alphab[26] = {0};
   char texte[10001];
   int lon;
   int nbTotal = 0;

   scanf("%[^\n]", texte);
   lon = strlen(texte);

   for(int i = 0 ; i < lon ; i++)
   {
      int valeur = tolower(texte[i]);

      if( (texte[i] >= 'a' && texte[i] <= 'z') || (texte[i] >= 'A' && texte[i] <= 'Z') )
      {
          alphab[valeur - 97]++;
          nbTotal++;
          /*printf("%c %d total%d\n" , texte[i] , valeur - 97 , nbTotal);*/
      }
   }

   for(int i = 0 ; i < 26 ; i++)
   {
       alphab[i] = ((double)(alphab[i]/nbTotal));
       printf("%lf\n" ,alphab[i]);
   }

   return 0;
}
