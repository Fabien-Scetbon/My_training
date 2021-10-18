#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
#include <math.h>

int main()
{
    int nbVariables;
    char nomVa[110];
    int lon;
    int valid = 0;
    int i,j;

    scanf("%d", &nbVariables);
    for(i = 0 ; i < nbVariables ; i++)
    {
        scanf(" %[^\n]", nomVa);
        lon = strlen(nomVa);

        for(j=0 ; j < lon ; j++)
        {
            if((nomVa[j] >= '0' && nomVa[j] <= '9') || (nomVa[j] >= 'a' && nomVa[j] <= 'z') || (nomVa[j] >= 'A' && nomVa[j] <= 'Z') || nomVa[j] == '_')
            {
                valid = 1;
            }
            else
            {
                valid = 0;
                break;
            }
        }
     if(nomVa[0] >= '0' && nomVa[0] <= '9') valid=0;

     switch(valid)
     {
     case 0:
        printf("NO\n");
        break;
     case 1:
         printf("YES\n");
        break;
     }


    }

    return 0;
}
