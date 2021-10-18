#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
#include <math.h>

int main()
{
    int nbLivres;
    char titre[101];
    int lon;
    int p;



    scanf("%d" , &nbLivres);

    for (p = 0 ; p < nbLivres ; p++)
    {
        scanf(" %[^\n]", titre);
        lon = strlen(titre);
        int i = 0;
        int j = lon - 1;
        int palind = 1;

        while(i < j)
        {
            if(titre[i] == ' ') i++;
            if(titre[j] == ' ') j--;
            /*printf("i%d j%d %c %c\n" , i , j , tolower(titre[i]) , tolower(titre[j]) );*/
            if( tolower(titre[i]) != tolower(titre[j]) )
            {
                palind = 0;
               /* printf("%d\n",palind);*/
            }
            i++;
            j--;
        }

        if(palind == 1)
        {

            printf("%s\n" , titre);

        }
    }
return 0;
}














