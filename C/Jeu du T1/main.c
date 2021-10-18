#include <stdio.h>
#include <stdlib.h>

#define taille 15

void menu(char move);

int main()
{
    char move = 'C';
    char *point_move = &move;

    menu(move);
    printf("%c\n" , move);
    return 0;
}

void menu(char move)
{

    printf("-- Move --\n\n");
    printf("Up    : u\n");
    printf("Down  : d\n");
    printf("Left  : l\n");
    printf("Right : r\n\n");
    printf("Exit  : x\n");

    scanf("%c" , &move);

    printf("%c\n" , move);

}
