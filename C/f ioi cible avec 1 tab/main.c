#include <stdio.h>
#include <stdlib.h>
void AffichLigne(char ligne[] , char alphaba[] , int nbLettre , int noLigne);

  int main()
  {
     int nbLettre;
     char alphab[100] = "abcdefghijklmnopqrstuvwxyz";
     int noLigne,j;

     char ligne[100];

     int lon;

     scanf("%d" , &nbLettre);
     lon = 2*nbLettre - 1;



     for(noLigne = 0 ; noLigne < lon/2 + 1 ; noLigne++)
     {
         afficheLigne(ligne , alphab , nbLettre , noLigne);
         printf("\n");
     }

     for(noLigne = lon/2 + 1 ; noLigne < lon ; noLigne++)
     {
         afficheLigne(ligne , alphab , nbLettre , lon - noLigne - 1);
         printf("\n");
     }
return 0;

}

 void afficheLigne(char ligne[] , char alphab[] , int nbLettre , int noLigne)
        {
            int noCol = 0;
            int lon;
            int i , p;

            lon = 2*nbLettre - 1;

            for(i = 0 ; i < lon/2 ; i++)
            {
                ligne[i] = alphab[i];
                ligne[lon - i - 1] = alphab[i];
            }
           ligne[lon/2] = alphab[lon/2];


            for (noCol = noLigne ; noCol < lon - noLigne ; noCol++)
            {
                ligne[noCol] = alphab[noLigne];
            }


           for(i = 0 ; i < lon ; i++)
            {
                printf("%c" , ligne[i]);
            }
        }
