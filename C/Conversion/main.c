#include <stdio.h>
#include <stdlib.h>

float conversion(float sommeEuros)
{
    return 6.55957 * sommeEuros;
}


int main(int argc, char *argv[])

{
    float sommeEuros = 0;

    printf("Somme en euros ?\n");
    scanf("%f" , &sommeEuros);


    printf("%f euros = %f Francs\n" , sommeEuros , conversion(sommeEuros));
    return 0;
}
