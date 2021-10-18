#include <stdio.h>
#include <stdlib.h>

int main()
{

    int min = 0 ,max = 0 , somme = 0 , i = 0 ;

    do
    {

    printf("Nombre min >=1 ? ");
    scanf("%d",&min);

    printf("Nombre max <= 1 000 ? ");
    scanf("%d", &max);

    if (max < min || max > 1000 || min < 1)
    {
        printf("Valeurs interdites\n");
    }

    } while (max < min || max > 1000 || min < 1);

    for (i = min ; i <= max ; i++)
    {
        somme += i;
    }

printf("La somme est %d\n" , somme);

    return 0;
}
