#include <stdio.h>
#include <stdlib.h>

int main()
{
    int echiquier[8][8];
    int i , j , x , y;

    for(i = 0 ; i < 8 ; i++)
    {
      for(j = 0 ; j < 8 ; j++)
      {
          echiquier[i][j] = 0;
      }
    }

    printf("Ligne du fou ");
    scanf("%d" ,&x);

    printf("Colonne du fou ");
    scanf("%d" ,&y);

    i=0;
    while(x+i<8 && y+i<8)
    {
        echiquier[x+i][y+i] = 1;
        i++;
    }

    i=0;
    while(x+i<8 && y-i>=0)
    {
        echiquier[x+i][y-i] = 1;
        i++;
    }

    i=0;
    while(x-i>=0 && y+i<8)
    {
        echiquier[x-i][y+i] = 1;
        i++;
    }

    i=0;
    while(x-i>=0 && y-i>=0)
    {
        echiquier[x-i][y-i] = 1;
        i++;
    }


    for(i = 0 ; i < 8 ; i++)
    {
        for(j = 0 ; j < 8 ; j++)
        {
            printf("[%d] " , echiquier[i][j]);
        }
        printf("\n\n");
    }

    return 0;
}
