#include <stdio.h>
#include <stdlib.h>

int main()
{
    int tableau[5] = {1,2,3,4,5};

    int* ptab1 = &tableau[1];

    printf("case %d pointeur %d\n\n" , *ptab1 , ptab1);

    ptab1 = ptab1 + 1 ;

    printf("case %d pointeur %d\n\n" , *ptab1 , ptab1);

    *ptab1 = 15;

    printf("case %d pointeur %d" , *ptab1 , ptab1);



    return 0;
}
