#include <stdio.h>
#include <stdlib.h>


int main()
{
   int nbLign = 0;
   int nbMot = 0;
   int nb[101] = {0};

   char mot[101];

   int i,k;

   scanf("%d" , &nbLign);
   scanf("%d" , &nbMot);



   printf("j = %d\n\n" , nbLign*nbMot);

   for(i = 0 ; i < nbLign*nbMot ; i++)
      {
         scanf("%s", mot);
         k =  strlen(mot);
         nb[k]++;




      }

   for(i = 1 ; i < 101 ; i++)
      {



         if(nb[i] !=0)
            {
               printf("%d : %d\n" , i , nb[i]);
            }
      }

  return 0;
 }
