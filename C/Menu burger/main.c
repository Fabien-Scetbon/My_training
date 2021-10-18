#include <stdio.h>
#include <stdlib.h>

int main()
{
    int choixMenu;
    choixMenu=0;
    printf("=== Menu ===\n\n");
    printf("1. Big Mac\n");
    printf("2. Royal cheese\n");
    printf("3. Mac bacon\n");
    printf("4. Mac Deluxe\n\n");
    printf("Votre choix ?");
    scanf("%d",&choixMenu);
    printf("\n\n");
    switch (choixMenu)
    {
    case 1:
        printf("Big Mac");
        break;
    case 2:
        printf("Royal cheese");
        break;
    case 3:
        printf("Mac bacon");
        break;
    case 4:
        printf("Mac Deluxe");
        break;
    default:
        printf("On n'a pas ca !");

    return 0;

    }


}



