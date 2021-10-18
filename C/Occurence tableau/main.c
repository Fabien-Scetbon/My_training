#include <stdio.h>
#include <stdlib.h>

void demande_tableau(int tableau[] , int *point_taille_tab);
void affiche_tableau(int tableau[] , int taille_tableau);
void decal_tableau(int tableau[] , int *point_taille_tab , int indice);

int main()
{
    int tab[100] = {0};
    int taille_tab = 1;
    int *point_taille_tab = &taille_tab;
    int i = 0, j = 0;

    demande_tableau(tab , point_taille_tab);
    affiche_tableau(tab , taille_tab);

    for (i = 0 ; i < 101 ; i++)
    {
        int occurence = 0;
        for (j = 0; j < taille_tab ; j++)
            if (tab[j] == i)
            {
                occurence++;
            }
    if (occurence !=0) printf("%d apparait %d fois\n" , i , occurence);

    }

    return 0;
}



void demande_tableau(int tableau[] , int *point_taille_tab)

{
    int i = 0;
    int taille_tableau = 1;

    printf("Taille du tableau = ");
    scanf("%d" , &taille_tableau);

    *point_taille_tab = taille_tableau;


    for(i = 0 ; i < taille_tableau ; i++)
    {
        printf("Element %d du tableau " , i);
        scanf("%d" , &tableau[i]);
        if (tableau[i] > 100)
        {
            printf("Choix impossible > 100\n");
            i = i - 1;
        }
    }
}



void affiche_tableau(int tableau[] , int taille_tableau)
{
    int i = 0;
    for(i = 0 ; i < taille_tableau ; i++ )
        printf("[%d] " , tableau[i]);

    printf("\n");
}

void decal_tableau(int tableau[] , int *point_taille_tableau , int indice)
{
    int i = 0;
    for(i = indice ; i < *point_taille_tableau ; i++)
    {
        tableau[i] = tableau[i + 1];

    }

    *point_taille_tableau = *point_taille_tableau - 1;
}
