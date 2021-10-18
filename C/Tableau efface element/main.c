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
    int element = 0;
    int i = 0;

    demande_tableau(tab , point_taille_tab);
    affiche_tableau(tab , taille_tab);

    printf("Element a supprimer = ");
    scanf("%d" , &element);

    for(i = 0 ; i < taille_tab ; i++)
    {

        if(tab[i] == element)
        {
            decal_tableau(tab , point_taille_tab , i);
            i = i - 1;
        }
    }


    affiche_tableau(tab , taille_tab);



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
