#include <stdio.h>
#include <stdlib.h>

int main()
{
    int i , j , n;
    int somme = 0 , somLi = 0 , somCol = 0 , somDiag = 0 ;

    printf("Cote du carre ? ");
    scanf("%d" , &n);

    int carre[n][n];
    int occurence[n*n];

    for(i = 0 ; i < n*n ; i++)
    {
        occurence[i] = 0;
    }

    for(i = 0 ; i < n ; i++)
    {
      for(j = 0 ; j < n ; j++)
      {
          printf("Valeur [%d][%d] ?" , i , j);
          scanf("%d" , &carre[i][j]);
      }
    }

    for(i = 0 ; i < n ; i++)
    {
      for(j = 0 ; j < n ; j++)
      {
          printf("[%d] " , carre[i][j]);

      }
      printf("\n");
    }

    for(j = 0 ; j < n ; j++)
     {
         somme = somme + carre[0][j];

     }
    printf("Somme = %d \n" , somme);


    for(i = 0 ; i < n ; i++)
    {
      for(j = 0 ; j < n ; j++)
      {
        somLi = somLi + carre[i][j];
        somCol = somCol + carre[j][i];
        printf("%d %d %d %d    " , i,j,somLi , somCol);
      }


    /*if(somLi != somme || somCol != somme)
      {
          printf("Le carre n'est pas magique\n");
          return 0;
      }*/

      somLi = 0;
      somCol = 0;
    }


    for(i = 0 ; i < n ; i++)
    {
        somDiag = somDiag + carre[i][i];
    }
    printf("SomDiag 1 = %d \n" , somDiag);
    /*if(somDiag != somme)
      {
          printf("Le carre n'est pas magique\n");
          return 0;
      }*/


    somDiag = 0;
     for(i = 1 ; i < n+1 ; i++)
    {
        somDiag = somDiag + carre[n-i][i-1];
    }
    printf("SomDiag 2 = %d \n" , somDiag);
    /*if(somDiag != somme)
      {
          printf("Le carre n'est pas magique\n");
          return 0;
      }*/

    for(i = 0 ; i < n ; i++)
    {
      for(j = 0 ; j < n ; j++)
      {
          occurence[carre[i][j]-1] = 1;

      }
    }

    for(i = 0 ; i < n*n ; i++)
    {
        printf("Occurence ");
        printf("%d " , occurence[i]);
        if(occurence[i] != 1)
        {
          printf("\nLe carre n'est pas magique\n");
          return 0;
        }
    }

    printf("\nLe carre est magique !");

    return 0;
}
