#include <stdio.h>
#include <stdlib.h>

void copie(int tableauOriginal[], int tableauCopie[], int tailleTableau);

int main()
{
   int tableauOriginal[5] = {7, 12, 23, 48, 56};
   int tableauCopie[5] = {0};
   int tailleTableau = 5;
   int i;

    for(i = 0 ; i <tailleTableau ; i++)
    printf("nombre %d dans tableau non copie est : [%d]\n\n" , i , tableauCopie[i]);

   copie(tableauOriginal , tableauCopie , tailleTableau);

   for(i = 0 ; i <tailleTableau ; i++)
    printf("nombre %d dans tableau copie est : [%d]\n\n" , i , tableauCopie[i]);

   return 0;
}

void copie(int tableauOriginal[], int tableauCopie[], int tailleTableau)
{
  int i;
  for (i = 0 ; i < tailleTableau ; i++)
    tableauCopie[i] = tableauOriginal[i];
}
