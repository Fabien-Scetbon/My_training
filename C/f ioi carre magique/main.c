#include <stdio.h>
#include <stdlib.h>

int main()
{
    int i , j , n;
    int somme = 0 , somLi = 0 , somCol = 0 , somDiag = 0 ;

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
          scanf("%d" , &carre[i][j]);
      }
    }

    for(j = 0 ; j < n ; j++)
     {
         somme = somme + carre[0][j];

     }

    for(i = 0 ; i < n ; i++)
    {
      for(j = 0 ; j < n ; j++)
      {
        somLi = somLi + carre[i][j];
        somCol = somCol + carre[j][i];
      }


    if(somLi != somme || somCol != somme)
      {
          printf("no\n");
          return 0;
      }

      somLi = 0;
      somCol = 0;
    }


    for(i = 0 ; i < n ; i++)
    {
        somDiag = somDiag + carre[i][i];
    }

    if(somDiag != somme)
      {
          printf("no\n");
          return 0;
      }


    somDiag = 0;
     for(i = 1 ; i < n+1 ; i++)
    {
        somDiag = somDiag + carre[n-i][i-1];
    }

    if(somDiag != somme)
      {
          printf("no\n");
          return 0;
      }

    for(i = 0 ; i < n ; i++)
    {
      for(j = 0 ; j < n ; j++)
      {
          occurence[carre[i][j]-1] = 1;

      }
    }

    for(i = 0 ; i < n*n ; i++)
    {


        if(occurence[i] != 1)
        {
          printf("no\n");
          return 0;
        }
    }

    printf("yes");

    return 0;
}
