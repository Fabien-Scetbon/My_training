#include <stdio.h>
#include <string.h>
#include <ctype.h>

void afficheTitre(char titre[] , int lon);
void acroTitre(char titre[] , char acronymeTitre[] , int lon);

int main()
{
    char acro[201];
    scanf(" %s" , acro);

    int nbLivres;
    scanf(" %d" , &nbLivres);

    char titre[201];
    int lon;

    char acronymeTitre[201];

    int i;

    for(i = 0 ; i < nbLivres ; i++)
    {
        scanf(" %[^\n]", titre);
        lon = strlen(titre);

        strcpy(acronymeTitre , "");
        acroTitre(titre , acronymeTitre , lon);

        if(strcmp(acronymeTitre , acro)== 0)  afficheTitre(titre , lon);
    }

 return 0;
}

void acroTitre(char titre[] , char acronymeTitre[] , int lon)
{
    int i;
    int j = 1;

    acronymeTitre[0] = toupper(titre[0]);

    for(i = 1 ; i < lon ; i++)
    {
        if(titre[i] == ' ')
        {
            acronymeTitre[j] = toupper(titre[i + 1]);
            j++;
        }
    }
    acronymeTitre[j] = '\0';

}

void afficheTitre(char titre[] , int lon)
{
    int i;
    for(i = 0 ; i < lon ; i++) titre[i] = tolower(titre[i]);

    titre[0] = toupper(titre[0]);
    for (i = 1; titre[i]!='\0'; i++)
        {
            if(titre[i] == ' ') titre[i+1] = toupper(titre[i+1]);
        }
    printf("%s\n" , titre);

}
