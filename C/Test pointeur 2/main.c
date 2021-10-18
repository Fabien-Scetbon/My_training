#include <stdio.h>
#include <stdlib.h>
void remplace(int *ptA);

int main()
{

    int nbA = 12;
    int *pointnbA = &nbA;

    printf("%d     %d      %d\n" , nbA , *pointnbA   ,    pointnbA);

    *pointnbA = *pointnbA - 1 ;

     printf("%d     %d      %d\n" , nbA , *pointnbA   ,    pointnbA);

    remplace(pointnbA);

    printf("%d     %d      %d\n" , nbA , *pointnbA   ,    pointnbA);

    enleve(pointnbA);

    printf("%d     %d      %d\n" , nbA , *pointnbA   ,    pointnbA);
    return 0;
}

void remplace(int *ptA)
{
    *ptA = 37;
}

void enleve(int *ptA)
{
    *ptA = *ptA - 1 ;
}
