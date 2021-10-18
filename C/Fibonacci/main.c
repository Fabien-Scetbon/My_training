#include <stdio.h>
#include <stdlib.h>

int main()
{
    int numero = 0;
    int i = 1;
    int u1 = 1;
    int u2 = 1;
    int u3 = 1;

    printf("Terme de la suite No ");
    scanf("%d" , &numero);

    while (i < numero + 1 )
    {

        printf("Terme No %d  = %d\n", i , u3);

        u3 = u1 + u2;
        u1 = u2;
        u2 = u3;

        i++;

    }


    return 0;
}
