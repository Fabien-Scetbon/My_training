#include <stdio.h>
#include <stdlib.h>

int main()

{
   int nbMarchands = 0;
   int indiceMarchand = 0;
   int prixChezi = 0;
   int prixMin = 0;
   int i = 0;

   scanf("%d" , &nbMarchands);

   for ( i = 1 ; i < nbMarchands + 1 ; i++)
      {
         scanf("%d" , &prixChezi);

         if(prixChezi <= prixMin)
            {
                prixMin = prixChezi;
                indiceMarchand = i;
                printf("%d %d %d\n" , prixMin , prixChezi , i);
            }

      }

   printf("%d" , indiceMarchand);

  return 0;
 }

