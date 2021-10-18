#include <stdio.h>
#include <stdlib.h>

void maximumTableau(int tableau[], int tailleTableau, int valeurMax);

int main()
{
    int tailleTableau = 10;
    int tableau[10] = {23, 9, 36, 15, 45, 29, 3, 31, 42, 50};
    int valeurMax = 0;

    int i;
    for(i = 0 ; i <tailleTableau ; i++)
    printf("nombre %d dans tableau du départ est : [%d]\n\n" , i , tableau[i]);




    printf("Valeur max ? ");
    scanf("%d", &valeurMax);

    maximumTableau(tableau , tailleTableau , valeurMax);

        for(i = 0 ; i <tailleTableau ; i++)
    printf("nombre %d dans tableau final est : [%d]\n\n" , i , tableau[i]);


    return 0;
}

void maximumTableau(int tableau[], int tailleTableau, int valeurMax)
{
    int i;
    for(i = 0 ; i < tailleTableau ; i++)

    if (tableau[i] > valeurMax)
    {
        tableau[i] = 0;
    }
}

