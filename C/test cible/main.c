#include <stdio.h>
#include <stdlib.h>


  int main()
  {
     int nbLettre;
     char alphab[100] = "abcdefghijklmnopqrstuvwxyz";


     char ligne[100];

     int lon;

     scanf("%d" , &nbLettre);
     lon = 2*nbLettre - 1;


     int i , p;

    for(i = 0 ; i < lon/2 ; i++)
            {

                ligne[i] = alphab[i];
                ligne[lon - i - 1] = alphab[i];
                printf("i %d lon - i - 1 %d alphab i %c\n" , i , lon - i - 1 , alphab[i]);

    /*------------------------------------------------*/
                 for(p = 0 ; p < 27 ; p++)
                {
                printf("%c" , alphab[p]);
                }
                printf("\n");


    /*------------------------------------------------------*/
            }

           ligne[lon/2] = alphab[lon/2];




           for(i = 0 ; i < lon ; i++)
            {
                printf("%c" , ligne[i]);
            }
        }
