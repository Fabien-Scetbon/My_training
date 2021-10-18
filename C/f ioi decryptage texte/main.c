#include <stdio.h>
#include <string.h>
#include <ctype.h>

int indiceLettre(char alphab[] , char lettre);

int main()
{
    char alphab[27] = "abcdefghijklmnopqrstuvwxyz";

    char grille[27];
    scanf(" %s" , grille);

    char texte[1001];
    int lon;
    scanf(" %[^\n]", texte);
    lon = strlen(texte);

    char lettre;
    int indice;

    for(int i = 0 ; i < lon ; i++)
    {
        if( isalpha(texte[i])  )
        {
            lettre = tolower(texte[i]);
            indice = indiceLettre(alphab , lettre);

            if(isupper(texte[i])) printf("%c" , toupper(grille[indice]));
            else printf("%c" , grille[indice] );
        }
        else printf("%c" , texte[i]);
    }
return 0;
}

int indiceLettre(char alphab[] , char lettre)
{
    for(int j = 0 ; j < 26 ; j++)
    {
        if(lettre == alphab[j]) return j;
    }
}
