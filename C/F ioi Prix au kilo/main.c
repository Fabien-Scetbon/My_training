#include <stdio.h>
#include <stdlib.h>

int main()
{
   int nbLeg = 0;
   double poids = 0;
   double age = 0;
   double prix = 0;
   int i = 0;

   scanf("%d" , &nbLeg);
   for(i = 1 ; i < nbLeg + 1 ; i++)
   {
       scanf("%lf %lf %lf" , &poids , &age , &prix);
       printf("%lf\n" ,  prix / poids);
    }
  }
