#include <stdio.h>
#include <stdlib.h>

int main()
{
    int tailleTableau = 1000;
    int tableau[1000];

    int tableauFinal[1000] = {0};

    int i,j;
    scanf(" %d" , &tailleTableau);
    for(i = 0 ; i < tailleTableau ; i++)
        scanf(" %d" , &tableau[i]);


    for(j = 0 ; j < tailleTableau ; j++)
    {

        int maximum = 0;
        int indiceDuMax = 0;

        for(i = 0 ; i < tailleTableau ; i++)
            {



                if(tableau[i] > maximum)
                    {
                        maximum = tableau[i];

                        indiceDuMax = i;




                    }







            }
        tableau[indiceDuMax] = 0;

        tableauFinal[j] = maximum;

    }



    for(i = 0 ; i <tailleTableau ; i++)
    {
        tableau[i] = tableauFinal[i];
    }


    for(i = tailleTableau - 1 ; i >=0 ; i--)
    {
        printf("%d " , tableau[i]);
    }



    return 0;
}
