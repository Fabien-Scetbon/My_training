#include <stdio.h>
#include <stdlib.h>

int recipPytha (int i, int j, int k);
int max (int a, int b, int c);

int main()
{
   int cota , cotb , cotc , plusGrandCote , rect = 0 ;

   printf("Longueur des 3 cotes du triangle ?\n");
   scanf("%d" , &cota);
   scanf("%d" , &cotb);
   scanf("%d" , &cotc);

   if ( cota == cotb && cota == cotc)
   {
       printf("Equilateral");
       return 0;
   }
   else
   {
       plusGrandCote = max (cota , cotb , cotc);
       printf("Longueur du plus grand cote = %d\n" , plusGrandCote);
   }

   if (plusGrandCote == cota)
   {
    rect = recipPytha(cota, cotb , cotc);
   }
   else if (plusGrandCote == cotb)
   {
    rect = recipPytha(cotb, cota , cotc);
   }
   else
   {
    rect = recipPytha(cotc, cota , cotb);
   }

    if (rect == 1)
    {
        printf("Le triangle est rectangle");
        return 0;
    }
    else
    {
        printf("Le triangle n'est pas rectangle");
        return 0;
    }





    return 0;
}

int max (int a, int b, int c)
{
   int max ;

   if (a>b && a>c)
   {
       max = a;
   }
   else if (b>a && b>c)
   {
       max = b;
   }
   else
   {
       max = c;
   }
    return max;
}

int recipPytha (int i, int j, int k)
{
    int rep;

    if (i*i == j*j + k*k)
    {
        rep = 1;
    }
    else
    {
        rep = 0;
    }
    return rep;
}

