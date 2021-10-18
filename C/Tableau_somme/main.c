#include <stdio.h>
#include <stdlib.h>

int sommeTableau(int tab[], int taille);

int main()
{
    int tableau[5]= {1, 2, 3, 4, 5};

    int taille = 5;

    int somme = 0;

    somme = sommeTableau(tableau, taille);

    printf("%d" , somme);

    return 0;
}

int sommeTableau(int tableau[], int tailleTableau)
{
    int i , increm_somme = 0;

    for(i = 0 ; i < tailleTableau ; i++)
    increm_somme = increm_somme + tableau[i];

    return increm_somme;

}
