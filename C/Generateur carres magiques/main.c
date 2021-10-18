#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#define dim 5



int magique(int carretest[][dim] , int n , int ok);

void main()
{
    srand(time(NULL));

    int i , j , n , k  ;
    int ok = 0;

    n = dim;
    int liste[n*n];
    int carre[n][n];


    while(ok < 1)
    {

   for(i = 0 ; i < n*n ; i++)
    {
        liste[i] = 0;
    }


    liste[0] = (rand() % (n*n)) + 1;


    for(i = 1 ; i <n*n ; i++)
    {
       liste[i] = (rand() % (n*n)) + 1;


       for(j = 0 ; j < i ; j++)
       {


           if(liste[j] == liste[i])
           {

               i--;
               break;

           }

       }
    }

k = 0;
for(i = 0 ; i <n ; i++)
{
    for(j = 0 ; j <n ; j++)
    {
        carre[i][j] = liste[k];
        k++;
    }
}

/*for(i = 0 ; i <n ; i++)
{
    for(j = 0 ; j <n ; j++)
    {
        printf("[%2d] " , carre[i][j]);
    }
    printf("\n");
}*/

ok = magique(carre , n , ok);

    }

for(i = 0 ; i <n ; i++)
{
    for(j = 0 ; j <n ; j++)
    {
        printf("[%2d] " , carre[i][j]);
    }
    printf("\n");
}

return 0;
}

/*.................................................................*/

int magique(int carretest[][dim] , int m , int ok)
{

    int somme = 0 , somLi = 0 , somCol = 0 , somDiag = 0 ;
    int i,j;

    for(j = 0 ; j < m ; j++)
     {
         somme = somme + carretest[0][j];
     }

    for(i = 0 ; i < m ; i++)
    {
      for(j = 0 ; j < m ; j++)
      {
        somLi = somLi + carretest[i][j];
        somCol = somCol + carretest[j][i];

      }


        if(somLi != somme || somCol != somme)
        {
          printf("x");
          ok = 0;
          return ok;
        }

      somLi = 0;
      somCol = 0;
    }


    for(i = 0 ; i < m ; i++)
    {
        somDiag = somDiag + carretest[i][i];
    }
    printf("\nSomDiag 1 = %d \n" , somDiag);
    if(somDiag != somme)
      {
          printf("x");
          ok = 0;
          return ok;
      }


    somDiag = 0;
     for(i = 1 ; i < m+1 ; i++)
    {
        somDiag = somDiag + carretest[m-i][i-1];
    }
    printf("\nSomDiag 2 = %d \n" , somDiag);
    if(somDiag != somme)
      {
          printf("x");
          ok = 0;
          return ok;
      }

    printf("Le carre est magique\n");
    ok = 1;


    return ok;
}
