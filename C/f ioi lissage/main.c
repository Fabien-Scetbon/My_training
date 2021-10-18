#include <stdio.h>
#include <stdlib.h>
#include <math.h>



int test(double tab[] , int lon , double diffMax);
void aftab(double tab[] , int lon );

int main()
{
    int nbMesures,p;
    int testo = 0;
    double diffMax;
    int nbTest = 0;

    scanf("%d" , &nbMesures);
    scanf("%lf" , &diffMax);

    double tab1[nbMesures];
    double tab2[nbMesures];
    int i,j;
    for(i = 0 ; i < nbMesures ; i++)
    {
        scanf("%lf" , &tab1[i]);
    }

    tab2[0] = tab1[0] ;
    tab2[nbMesures - 1] = tab1[nbMesures - 1] ;

    if(nbMesures == 1 || nbMesures == 2)
    {
        printf("0");
        return 0;
    }



    while(testo == 0)

    {
        /*printf("testo%d nbTest%d\n" , testo , nbTest);*/

        for(i=1 ; i < nbMesures - 1 ; i++)
        {
            tab2[i] = ((double)(tab1[i - 1] + tab1[i + 1])/2);
            /*printf("%lf  " , tab2[i]);*/
        }
      /* printf("\n");*/

        for(i=1 ; i < nbMesures - 1 ; i++)
        {
            tab1[i] = tab2[i];
        }

       /* aftab(tab1 , nbMesures);*/


        nbTest++;
        testo = test(tab1 , nbMesures , diffMax);
      /*  printf("testo %d\n" , testo);
        scanf("%d" , &j);*/
    }

    printf("%d\n" , nbTest);

    return 0;
}

int test(double tab[] , int lon , double diffMax)
{
    int i;
    for(i=0 ; i < lon - 1 ; i++)
    {
        if( fabs( tab[i+1] - tab[i] ) > diffMax ) return 0;
    }
     return 1;
}

void aftab(double tab[] , int lon )
{
    int i;
    for(i=0 ; i < lon ; i++)
    {
        printf("%lf\n" , tab[i]);
    }
    printf("\n");

}
