#include <stdio.h>
#include <stdlib.h>


void trouverMax(int tableau[] , int tailleTableau , int indiceDepart , int *pointMax , int *pointIndiceMax);
void permut(int tableau[] , int p , int *q);
void afficheTableau(int tableau[] , int tailleTableau);

int main()
{
    int tailleTableau = 10;
    int tableau[10] = {3, 14, 25, 7, 21, 25, 10, 35, 29, 17};

    int maximum = 0;
    int indiceMaximum = 0;

    int *pointeurMaximum = &maximum;
    int *pointeurIndiceMaximum = &indiceMaximum;

    afficheTableau(tableau , tailleTableau);

    int j;

    for(j = 0 ; j < tailleTableau ; j++)

    {
        trouverMax(tableau , tailleTableau , j , pointeurMaximum , pointeurIndiceMaximum);
        printf("Max = %d\n" , *pointeurMaximum);
        printf("IndiceMax = %d\n" , *pointeurIndiceMaximum);

        permut(tableau, j , pointeurIndiceMaximum);

        /* afficheTableau(tableau , tailleTableau); */
    }

    afficheTableau(tableau , tailleTableau);



    return 0;
}

void afficheTableau(int tableau[] , int tailleTableau)
    {
        int i;

        for(i = 0 ; i <tailleTableau ; i++)
            {
                printf("[%d] " , tableau[i]);

            }
        printf("\n\n");
    }

void permut(int tableau[] , int p , int *q)
    {
        int provisoire = 0;

        provisoire = tableau[p];
        tableau[p] = tableau[*q];
        tableau[*q] = provisoire;

    }

void trouverMax(int tableau[] , int tailleTableau , int indiceDepart , int *pointMax , int *pointIndiceMax)
    {

         *pointMax = 0;

         int i;

         for(i = indiceDepart ; i < tailleTableau ; i++)
            {
                /* printf("i = %d\n" , i); */

                if(tableau[i] > *pointMax)
                    {
                        *pointMax = tableau[i];

                       /* printf("maximum = %d\n", *pointMax); */

                        *pointIndiceMax = i;

                    }
            }
    }

