#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main()
{ int nombreMystere;
  int compteur = 0;


    srand(time(NULL));

    for (compteur = 1 ; compteur < 201 ; compteur ++)
    {
         nombreMystere = (rand() % 100) + 1;
        printf("numero %d et nb aleatoire %d\n\n", compteur , nombreMystere);

    }

}
