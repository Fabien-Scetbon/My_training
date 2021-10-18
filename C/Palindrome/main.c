#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main()
{
    char mot[100];
    int longueur_mot;
    int i,ok = 0;

    printf("Entrez un mot : ");
    scanf("%s" , mot);

    longueur_mot = strlen(mot);



    for(i = 0 ; i < (longueur_mot/2) ; i++)
    {
        /*printf(" %d %d %c %c " , i , (longueur_mot - i - 1), mot[i], mot[(longueur_mot - i - 1)]);*/
        if(mot[i] != mot[(longueur_mot - i - 1)])

               ok = 0 ;

        else ok = 1;
    }

   if(ok == 1 )

    printf("Mot palindrome\n");

   else
    printf("Mot non palindrome\n");

    return 0;
}
