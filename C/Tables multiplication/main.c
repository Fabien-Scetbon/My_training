#include <stdio.h>
#include <stdlib.h>

int main()
{
    int tableau[10] = {0};
    int i,j;



    for(i=1 ; i<11 ; i++)
    {
        for(j=1 ; j<11 ; j++)
        {
            printf("%d x %d = %d\n", i , j , i*j);
        }
    }

    return 0;
}

