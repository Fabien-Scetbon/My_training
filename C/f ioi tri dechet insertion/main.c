#include <stdio.h>
#include <stdlib.h>

int main()
{
    int nbStock;
    int nbDechet;
    scanf("%d%d" , &nbStock , &nbDechet);

    int stock[5500];
    int indiceDechet[500];
    int i;

    for(i = 0 ; i < nbStock ; i++)
        scanf(" %d" , &stock[i]);

    int noDechet = 0;
    int dechetActuel = 0;
    int indiceStock = 0;

    while(noDechet < nbDechet)
    {
        scanf(" %d" , &dechetActuel);
        while(dechetActuel > stock[indiceStock] && indiceStock < nbStock)
        {
            indiceStock++;
        }

        for(i = nbStock ; i > indiceStock ; i--)
            stock[i] = stock[i - 1];
            /*printf("i %d stock i %d\n" , i , stock[i]);*/

        stock[indiceStock] = dechetActuel;
        indiceDechet[noDechet] = indiceStock;

        noDechet++;
        indiceStock = 0;
        nbStock++;

    }

    for(i = 0 ; i < nbDechet ; i++)
        printf("%d " , indiceDechet[i]);
    printf("\n");

    for(i = 0 ; i < nbStock ; i++)
        printf("%d " , stock[i]);








    return 0;
}
