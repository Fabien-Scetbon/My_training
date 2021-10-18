#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
#include <stdbool.h>

void rectangle(char image[100][100] , int ymin, int xmin , int ymax , int xmax);

int main()
{
    int nbLig, nbCol;
    scanf(" %d%d" , &nbLig , &nbCol);

    int nbRect;
    scanf(" %d" , &nbRect);

    char image[100][100];

    int lig, col , noRect;
    int xmin, ymin , xmax , ymax;

    for (lig = 0 ; lig < nbLig ; lig++)
    {
        for (col = 0 ; col < nbCol ; col++)
        {
            image[lig][col] = '.';
        }
    }

    for ( noRect = 0 ; noRect < nbRect ; noRect++)
    {
        scanf(" %d%d%d%d" , &ymin, &xmin , &ymax , &xmax);
        rectangle(image , ymin, xmin , ymax , xmax);
    }

    for (lig = 0 ; lig < nbLig ; lig++)
    {
        for (col = 0 ; col < nbCol ; col++)
        {
            printf("%c" , image[lig][col]);
        }
    printf("\n");
    }

    return 0;
}

void rectangle(char image[100][100] , int ymin, int xmin , int ymax , int xmax)
{
     int lig, col;
     char car;
     scanf(" %c" , &car);

     for(lig = ymin ; lig <=ymax ; lig++)
     {
         for(col = xmin ; col <=xmax ; col++)
         {
             image[lig][col] = car;
         }
     }
}
