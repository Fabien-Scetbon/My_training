#include <stdio.h>
#include <stdlib.h>
#include <math.h>

int delta(int a, int b, int c); // prototype fonction delta

int main()
{
    int a = 0, b = 0, c = 0;
    int discriminant = 0;

    printf("ax2 + bx + c\n\n");

    printf("\nValeur de a ?\n\n");
    scanf("%d", &a);

    printf("\nValeur de b ?\n\n");
    scanf("%d", &b);

    printf("\nValeur de c ?\n\n");
    scanf("%d", &c);

    printf("Le polynome est %dx2 + %dx + %d\n\n", a, b, c);

    discriminant = delta(a , b , c);
    printf("Delta = %d\n\n" , discriminant);

    if (discriminant > 0)
    {
        double x = 0 , y = 0;
        x = (- b - sqrt (discriminant))/ (2*a);
        y = (- b + sqrt (discriminant))/ (2*a);
        printf("Deux solutions : %f et %f" , x , y);
    }

    else if (discriminant == 0)
    {
        double x = 0;
        x = (- b / (2 * a));
        printf("Une solution : %f" , x);
    }

    else
    {
        printf("Pas de solution");
    }
    return 0;
}

int delta( int a, int b, int c) // definir fonction delta
{
    return b*b - 4*a*c;
}
