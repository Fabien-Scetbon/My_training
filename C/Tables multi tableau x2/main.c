#include <stdio.h>
#include <stdlib.h>

int main()
{
    int tables[10][10] = {{0,0}};
    int i,j;

    for (i=0 ; i<10 ; i++)
    {
       for (j=0 ; j<10 ; j++)
       {
           tables[i][j]=(i+1)*(j+1);
       }
    }

    for (i=0 ; i<10 ; i++)
    {
       for (j=0 ; j<10 ; j++)
       {
           printf("[%2d] " , tables[i][j]);
       }
       printf("\n\n");
    }




    return 0;
}
