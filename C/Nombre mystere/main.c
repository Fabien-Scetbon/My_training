#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main()
{
    int MAX ;
    int nbJoueur = 0;
    int continuerPartie = 1;

    srand(time(NULL));

    do
    {
        int nombreMystere = 0;
        int nbCoups = 0;
        int reponse = 0;
        do
        {


            printf("Combien de joueurs 1 ou 2 ?\n");
            scanf("%d" , &nbJoueur);

            if (nbJoueur == 1)
            {
                nombreMystere = (rand() % (MAX)) + 1;
            }
            else if (nbJoueur == 2)
            {
                printf("Quel est le nombre a trouver ?\n");
                scanf("%d" , &nombreMystere);
            }
            else if (nbJoueur !=1 && nbJoueur !=2)
            {
                printf("Choix impossible\n\n");
            }


        }while (nbJoueur !=1 && nbJoueur !=2);



        while (reponse != nombreMystere)

        {

        printf("Quel est ton nombre ?\n");
        scanf("%d",&reponse);

        if (reponse > nombreMystere)
        {
            printf("Trop grand\n\n");
        }
        else if (reponse < nombreMystere)
        {
            printf ("Trop petit\n\n");
        }
        nbCoups++;
        }
        printf ("Gagne en %d coups\n", nbCoups);

        printf("Une autre partie 0 ou 1 ?\n");
        scanf("%d",&continuerPartie);


    }while (continuerPartie);  // booléen

    printf("Fin de partie\n");

   return 0;
}

