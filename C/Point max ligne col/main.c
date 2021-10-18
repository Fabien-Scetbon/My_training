#include <stdio.h>
#include <stdlib.h>


int main()
{
    int nb_lignes , nb_colonnes;
    int i , j;
    int max , min;

    printf("Nombre de lignes ? ");
    scanf("%d" , &nb_lignes);

    printf("Nombre de colonnes ? ");
    scanf("%d" , &nb_colonnes);

    int tableau[nb_lignes][nb_colonnes];
    int tab_max[nb_lignes][nb_colonnes] ;
    int tab_min[nb_lignes][nb_colonnes] ;


    for(i = 0 ; i < nb_lignes ; i++)
    {
        for(j = 0 ; j < nb_colonnes ; j++)
        {
          printf("Element [%d][%d] " , i , j);
          scanf("%d" , &tableau[i][j]);

          tab_max[i][j] = 0;
          tab_min[i][j] = 0;
        }

    }



    for(i = 0 ; i < nb_lignes ; i++)
        {
            for(j = 0 ; j < nb_colonnes ; j++)
            {

                printf("[%d] " , tableau[i][j]);

            }
            printf("\n");
        }

    printf("\n");


     for(i = 0 ; i < nb_lignes ; i++)
    {
        max = 0;
        for(j = 0 ; j < nb_colonnes ; j++)
        {
            if(tableau[i][j] > max) max = tableau[i][j];
        }

        for(j = 0 ; j < nb_colonnes ; j++)
        {
            if(tableau[i][j] == max) tab_max[i][j] = 1;
        }

    }

    for(i = 0 ; i < nb_lignes ; i++)
        {
            for(j = 0 ; j < nb_colonnes ; j++)
            {

                printf("[%d] " , tab_max[i][j]);

            }
            printf("\n");
        }

    printf("\n");

    for(j = 0 ; j < nb_colonnes ; j++)
    {
        min = 100;

        for(i = 0 ; i < nb_lignes ; i++)
        {
            if(tableau[i][j] < min) min = tableau[i][j];
        }

        for(i = 0 ; i < nb_lignes ; i++)
        {
            if(tableau[i][j] == min) tab_min[i][j] = 1;
        }

    }

    for(i = 0 ; i < nb_lignes ; i++)
        {
            for(j = 0 ; j < nb_colonnes ; j++)
            {

                printf("[%d] " , tab_min[i][j]);

            }
            printf("\n");
        }

    printf("\n");

    for(i = 0 ; i < nb_lignes ; i++)
    {
        for(j = 0 ; j < nb_colonnes ; j++)
        {
            if(tab_max[i][j] == 1 && tab_min[i][j] == 1)
            {
                printf("Point max - min [%d] en [%d][%d]\n" , tableau[i][j] , i , j);
            }
        }



    }

    return 0;
}









