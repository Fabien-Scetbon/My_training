#include <stdio.h>
#include <stdlib.h>

int longueur_chaine(char chaine[]);
int occurence(char chaine[] , int long_chaine ,char caractere , int occur);
int main()
{
    char chaine[100];
    int long_chaine = 0;
    char caractere = 0;
    int occur = 0;

    printf("Quelle est la chaine (sans espace) ?");
    scanf("%s" , chaine);
    printf("\n%s\n\n" , chaine);

    long_chaine = longueur_chaine(chaine);
    printf("Longueur chaine = %d\n\n" , long_chaine);

    printf("Caractere a compter : ");
    scanf(" %c" , &caractere);   /* le coup du " " devant %c*/

    occur = occurence(chaine , long_chaine , caractere, occur);
    printf("\nLe caractere %c se trouve %d fois\n" , caractere , occur);


    return 0;
}

int longueur_chaine(char chaine[])
{
    int i = 0;
    int long_chaine = 0;
    while (chaine[i] != '\0')
    {
        long_chaine++;
        i++;

    }

    return long_chaine;

}

int occurence(char chaine[] , int long_chaine ,char caractere , int occur)
{
    int i = 0;


    for(i = 0 ; i < long_chaine ; i++)
    {
        if (chaine[i] == caractere)
        {
            occur++;
        }
    }

    return occur;
}
