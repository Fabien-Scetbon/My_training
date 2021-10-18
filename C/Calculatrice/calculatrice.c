#include <stdio.h>
#include <stdlib.h>
#include "calculatrice.h"


int menu()
{
    int choix;

    do
    {

        printf("Choix de l'opération :\n\n");

        printf("1 - addition\n");
        printf("2 - soustraction\n");
        printf("3 - multiplication\n");
        printf("4 - division\n");

        scanf("%d",&choix);

    } while (choix < 1 || choix > 4);

    return choix;
}


int addition(int a, int b)
{
    return a + b;
}

int soustraction(int a, int b)
{
    return a - b;
}

int multiplication(int a, int b)
{
    return a * b;
}

int division(int a, int b)
{
    if (b == 0)
    {
       printf("Division par 0 impossible");
       exit(-1);
    }

    return a / b;
}

int calcul (int nb1 , int nb2)
{
    int choix;

    printf("Nombre 1\n");
    scanf("%d",&nb1);

    printf("Nombre 2\n");
    scanf("%d",&nb2);

    choix = menu();

    switch (choix)
    {
        case 1:
            printf("Resultat de l'addition : %d" , addition(nb1 , nb2));
            break;

       case 2:
            printf("Resultat de la soustraction : %d" , soustraction(nb1 , nb2));
            break;

        case 3:
            printf("Resultat de la multiplication : %d" , multiplication(nb1 , nb2));
            break;

        case 4:
            printf("Resultat de la division : %d" , division(nb1 , nb2));
            break;
    }
}




