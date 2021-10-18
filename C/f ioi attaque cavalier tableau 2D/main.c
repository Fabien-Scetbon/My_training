#include <stdio.h>
#include <string.h>
#include <ctype.h>
#include <stdbool.h>

bool deplacements(char carre[8][8] , int cavaliers[2][2] , int noCav , int nbCav);

int main()
{
    int lign , col;

    char carre[8][8];
    int cavaliers[2][2] = { {0,0} , {0,0} };
    int nbCav = 0;

    for(lign = 0 ; lign < 8 ; lign++)
    {
         for(col = 0 ; col < 8 ; col++)
         {
              scanf(" %c" , &carre[lign][col]);

              if(carre[lign][col]=='C')
              {
                  nbCav++;
                  cavaliers[nbCav - 1][0] = lign;
                  cavaliers[nbCav - 1][1] = col;
              }
         }
    }

    /*for(lign = 0 ; lign < 8 ; lign++)
    {
         for(col = 0 ; col < 8 ; col++)
         {
              printf("%c" , carre[lign][col]);

         }
         printf("\n");
    }
     for(lign = 0 ; lign < 2 ; lign++)
    {

         for(col = 0 ; col < 2 ; col++)
         {
              printf("%d" , cavaliers[lign][col]);

         }
         printf("\n");
    }*/


    if(nbCav == 0)
    {
        printf("no");
        return 0;
    }

    for(int noCav = 0 ; noCav < nbCav ; noCav++)
    {
        if( deplacements(carre , cavaliers , noCav , nbCav) == true)
        {
            printf("yes");
            return 0;
        }

    }
    printf("no");

return 0;
}

bool deplacements(char carre[8][8] , int cavaliers[2][2] , int noCav , int nbCav)
{

    int lignAriv;
    int colAriv;

    for(int direct = 0 ; direct < 8 ; direct++)
    {
        switch(direct)
        {
        case 0:
            lignAriv = cavaliers[noCav][0] - 2;
            colAriv = cavaliers[noCav][1] - 1;
            break;
        case 1:
            lignAriv = cavaliers[noCav][0] - 2;
            colAriv = cavaliers[noCav][1] + 1;
            break;
        case 2:
            lignAriv = cavaliers[noCav][0] - 1;
            colAriv = cavaliers[noCav][1] + 2;
            break;
        case 3:
            lignAriv = cavaliers[noCav][0] + 1;
            colAriv = cavaliers[noCav][1] + 2;
            break;
        case 4:
            lignAriv = cavaliers[noCav][0] + 2;
            colAriv = cavaliers[noCav][1] - 1;
            break;
        case 5:
            lignAriv = cavaliers[noCav][0] + 2;
            colAriv = cavaliers[noCav][1] + 1;
            break;
        case 6:
            lignAriv = cavaliers[noCav][0] + 1;
            colAriv = cavaliers[noCav][1] - 2;
            break;
        case 7:
            lignAriv = cavaliers[noCav][0] - 1;
            colAriv = cavaliers[noCav][1] - 2;
            break;
        }

        /*printf("noCav %d lignAriv %d colAriv %d\n" , noCav , lignAriv , colAriv);*/

        if(lignAriv >= 0 && lignAriv <= 7 && colAriv >=0 && colAriv <=7)
        {
            /*printf("%c\n" , carre[lignAriv][colAriv] );*/
            if( (carre[lignAriv][colAriv] != '.') && (islower(carre[lignAriv][colAriv])) ) return true;
        }
    }
    return false;

}
