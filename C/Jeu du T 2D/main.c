#include <stdio.h>
#include <stdlib.h>

void affichage(int *point_taille_map , int *point_x);
void calcul_affichage(int *point_x , char *point_move , int *point_taille_map);
void menu_choix(char *point_move);

int main(void)
{
    int x = 1;
    int *point_x = &x;

    char move = 'g';
    char *point_move = &move;

    int taille_map;
    int *point_taille_map = &taille_map;

    printf("Taille de la map : ");
    scanf("%d" , &taille_map);

    do
    {
        affichage(point_taille_map , point_x);
        menu_choix(point_move);
        calcul_affichage(point_x , point_move , point_taille_map);

    } while (*point_move != 'q');

    printf("Au revoir\n");
    return 0;

}

void calcul_affichage(int *point_x , char *point_move , int *point_taille_map)
{
    switch (*point_move)
    {
    case 'a':
        *point_x = *point_x - 1 ;
        break;
    case 'p':
        *point_x = *point_x + 1 ;
        break;
    case 'q':
        *point_move = 'q';
        break;
    default:
        printf("impossible\n");
        break;
    }

    if (*point_x < 1)
    {
        *point_x = 1;
    }

    if (*point_x > *point_taille_map - 2)
    {
         *point_x = *point_taille_map - 2;
    }

}

void menu_choix(char *point_move)
{
    printf("Mouvement :\n\n");
    printf("a - gauche\n");
    printf("p - droite\n");
    printf("q - quitter\n");
    scanf(" %c" , point_move); /* mettre un " " devant le %c sinon il a garde en memoire le \n de la touche entree*/
}


void affichage(int *point_taille_map , int *point_x)
{
    int i;
    char map[*point_taille_map];

    for(i = 0 ; i < *point_taille_map ; i++ )
    {
       if (i == 0  || i == *point_taille_map - 1) printf("O");

        else if(i == *point_x) printf("X");
        else printf(" ");

    }
    printf("\n\n");
}
