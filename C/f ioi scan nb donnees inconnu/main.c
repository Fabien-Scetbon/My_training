#include <stdio.h>
#include <string.h>
#include <ctype.h>

int main()
{
    int total = 0;
    int nb;

    while(!(scanf("%d" , &nb) != 1))
    {
       total +=nb;
    }

    printf("%d" , total);
    return 0;
}
