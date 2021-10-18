#include <stdio.h>
#include <stdlib.h>

void remplaceValeursint(int *pointeurA , int *pointeurB);

int main()
{
    int nbA = 15;
    int nbB = 23;

    int *pointA = &nbA;
    int *pointB = &nbB;

    printf("Depart\n\n");
    printf("A = %d\n" , nbA);
    printf("adresseA = %d\n" , &nbA);
    printf("pointA = %d\n" , pointA);
    printf("A = par pointeur %d\n\n" , *pointA);

    printf("B = %d\n\n" , nbB);

    remplaceValeurs(pointA , pointB);  /* le pb était la : ne pas mettre *pointA */

    printf("Retour fonction\n\n");
    printf("A = %d\n" , nbA);
    printf("adresseA = %d\n" , &nbA);
    printf("pointA = %d\n" , pointA);
    printf("A = par pointeur %d\n\n" , *pointA);

    printf("B = %d\n" , nbB);

    return 0;
}

void remplaceValeurs(int *pointeurA , int *pointeurB)
{

    *pointeurA = 57;
    *pointeurB = 62;

    printf("Dans fonction \n\n");

    printf("A = %d\n" , *pointeurA);
    printf("pointA = %d\n\n" , pointeurA);

    printf("B = %d\n\n" , *pointeurB);
}
