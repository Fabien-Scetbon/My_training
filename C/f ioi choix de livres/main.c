#include <stdio.h>
#include <string.h>
#include <ctype.h>

int main()
{
   int nbLivres;
   int i = 0;
   int tour = 1;
   scanf("%d" , &nbLivres);
   char livres[nbLivres][101];

   scanf(" %[^\n]", livres[0]);
   printf("%s\n" , livres[0]);
   i = 1;
   tour = 2;

   while(tour <= nbLivres)
   {
      /*printf("i debut %d\n" ,i);*/

      scanf(" %[^\n]", livres[i]);
      if(strcmp(livres[i - 1] , livres[i]) < 0)
      {
          printf("%s\n" , livres[i]);
          i++;
          tour++;

          /*printf("i si alphab %d\n" ,i);*/
      }
        else
        {
           /* printf("i si pas alphab %d\n" ,i);*/
            tour++;
        }
   }

return 0;
}



