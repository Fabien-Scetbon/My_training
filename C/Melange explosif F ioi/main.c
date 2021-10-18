#include <stdio.h>
#include <stdlib.h>

int main()
{
   int nbMesures = 0;
   int mesurei = 0;
   int i = 0;
   int max = 0 , min = 0;


   scanf("%d" , &nbMesures);
   scanf("%d" , &min);
   scanf("%d" , &max);

   for( i = 1 ; i <= nbMesures ; i++)
   {
      scanf("%d" , &mesurei);
      if (mesurei >= min && mesurei <= max)
         {
            printf("Rien a signaler\n");
         }
      else
      {
         printf("Alerte !!\n");
         return 0;
      }
    }
 }
