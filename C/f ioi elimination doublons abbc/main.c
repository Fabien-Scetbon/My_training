#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void decale(char morceau[] , int i, int lon);

int main()
{
   char morceau[505];
   int lon;
   int i,j,k;

   scanf("%s" , morceau);
   lon = strlen(morceau);

   for (j = 0 ; j < (lon + 5) ; j++)
   {
       for (i = 0 ; i < lon - 1  ; i++)
        {
            printf("lon %d i %d mor i %c mor i+1 %c\n" , lon ,i , morceau[i] , morceau[i + 1]);

            if (morceau[i] == morceau[i + 1])
            {
                decale(morceau , i , lon);
                lon = lon - 2;

                 for(k = 0 ; k < lon ; k++)
                {
                    printf("%c" , morceau[k]);
                }
                printf("\n");

            }
        }
   }

    for(i = 0 ; i < lon ; i++)
                {
                    printf("%c" , morceau[i]);
                }
                printf("\n");
return 0;
}

 void decale(char morceau[] , int i, int lon)
 {
    int j;
    for(j = i ; j < lon - 2 ; j++)
    {
       morceau[j] = morceau[j + 2];
    }
 }






