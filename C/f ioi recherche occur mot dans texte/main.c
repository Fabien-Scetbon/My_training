#include <stdio.h>
#include <string.h>
#include <ctype.h>

void minuscule(char chaine[]);

int main()
{
    char mot[51];
    scanf("%s" , mot);

    char motScan[51];
    int occur = 0;

    while(scanf("%s" , motScan) == 1)
    {

       minuscule(mot);
       minuscule(motScan);

       if(strcmp(mot , motScan)== 0) occur++;
        printf("%d\n" , occur);
    }

    printf("%d" , occur);
    return 0;
}

void minuscule(char chaine[])
{
    int i;
    for (i = 0; chaine[i]!='\0'; i++)
        {
            if(chaine[i] >= 'A' && chaine[i] <= 'Z')
            {
                chaine[i] = tolower(chaine[i]);
            }
        }

}
