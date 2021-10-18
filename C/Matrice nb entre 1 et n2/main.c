#include <stdio.h>
#include <stdlib.h>

int main()
{
    int n;

    printf("Taille matrice = ");
    scanf("%d" , &n);

    int matrice[n][n];

    int i,j;

    for (i=0 ; i<n ; i++)
    {
       for (j=0 ; j<n ; j++)
       {
            printf("Element [%d][%d] = ", i , j);
            scanf("%d" , &matrice[i][j]);
       }
    }

    for (i=0 ; i<n ; i++)
    {
       for (j=0 ; j<n ; j++)
       {
            printf("[%2d]", matrice[i][j]);

       }
       printf("\n");
    }

    int existe[n*n];

    for (i=0 ; i<n*n ; i++) existe[i]=0;

    for (i=0 ; i<n ; i++)
    {
       for (j=0 ; j<n ; j++)
       {

            existe[(matrice[i][j]) - 1] = 1;
       }

    }
    for (i=0 ; i<n*n ; i++) printf("%d " , existe[i]);
    printf("\n");

    for (i=0 ; i<n*n ; i++)
    {
        if(existe[i] == 0)
        {
            printf("Les nombres n'y sont pas tous");
            return 0;

        }



    }
    printf("Les nombres y sont tous");
    return 0;
}
