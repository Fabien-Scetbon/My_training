#include <stdio.h>
#include <stdlib.h>

int main()
{
   int i , indiceMax;
   int nbStock;
   int nbCamion;
   int noDechet = 0;
   int max = 0;
   scanf("%d%d" , &nbStock , &nbCamion);

   int stock[nbStock];
   for (i = 0 ; i < nbStock ; i++)
       scanf(" %d" , &stock[i]);

   while(noDechet < nbCamion)
   {
       for (i = 0 ; i < nbStock ; i++)
       {
           if(stock[i] > max)
           {
               max = stock[i];
               indiceMax = i;
           }
       }

       printf("%d " , max);
       max = 0;
       stock[indiceMax] = 0;
       noDechet++;
   }





    return 0;
}
