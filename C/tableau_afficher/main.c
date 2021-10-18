#include <stdio.h>
#include <stdlib.h>

void afficher_tableau(int tab[], int taille);

int main()
{
    int tableau[5] = {1 , 2 , 3 , 4 , 5};
    int taille = 5;

    afficher_tableau(tableau, taille);
    return 0;
}
 void afficher_tableau(int tab[], int taille)
 {
     int i;

     for(i = 0 ; i < taille ; i++)
        printf("%d" , tab[i]);
 }
