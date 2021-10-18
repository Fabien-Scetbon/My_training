#include <stdio.h>
#include <stdlib.h>

void diviseurs(int nombre);

int main()
{
    int nombre;

    printf("Nombre ? ");
    scanf("%d" , &nombre);
    printf("\n\n");

    diviseurs(nombre);

    return 0;
}

void diviseurs(int nombre)
{
    printf("Liste des diviseurs :\n\n");

    int i = 1;
    int premier = 1;

    printf("1\n\n");

    do
    {
      i++;

      if (nombre%i == 0 && i != 0 && i != nombre)
      {
          printf("%d\n\n" , i);

          premier = 0;
      }

    } while (i < nombre - 1);

    printf("%d\n\n" , nombre);

    if (premier)
    {
         printf("Le nombre %d est premier \n" , nombre);
    }
    else
    {
       printf("Le nombre %d n'est pas premier \n" , nombre);
    }
}
