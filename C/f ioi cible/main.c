#include <stdio.h>
#include <stdlib.h>

void rectangle( char tab[][100] , char alphab[] , int lon , int rangee);


  int main()
  {
     int nbLettre;
     char alphab[100] = "abcdefghijklmnopqrstuvwxyz";
     int i,j,k;

     char tab[100][100];


     int lon;

     scanf("%d" , &nbLettre);
     lon = 2*nbLettre - 1;

     for(k = 0 ; k < nbLettre ; k++)
      {

       rectangle(tab , alphab , lon , k);

      }
      for(i = 0 ; i < lon ; i++)
      {
         for(j = 0 ; j < lon ; j++)
         {
            printf("%c" , tab[i][j]);
         }
         printf("\n");
      }



        return 0;
}

 void rectangle( char tab[][100] , char alphab[] , int lon , int rangee)
 {
     int j;

     for(j = rangee ; j < lon - rangee ; j++)
        {
           tab[rangee][j] = alphab[rangee];
           tab[lon - rangee - 1][j] = alphab[rangee];
           tab[j][rangee] = alphab[rangee];
           tab[j][lon - rangee - 1] = alphab[rangee];

        }
  }




