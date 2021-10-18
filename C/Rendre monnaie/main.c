#include <stdio.h>
#include <stdlib.h>

int main()
{

   int montantAchats = 0.0 , sommeDonnee = 0.0 , monnaie = 0.0 ;

   printf("Montant achats ? ");
   scanf("%d", &montantAchats);

   printf("Somme donnee ? ");
   scanf("%d", &sommeDonnee);

   monnaie = sommeDonnee - montantAchats;
   printf("La monnaie est de %d euros\n" , monnaie);

   if (monnaie == 0)
   {
       printf("Merci et au revoir !\n");
   }
   else if (monnaie < 0)
   {
       printf("Il manque %d euros\n" , -monnaie);
   }
   else
   {
       int vingt = 0 , dix = 0 , cinq = 0 , deux = 0 , un = 0;
       vingt = monnaie/20;
       monnaie = monnaie - vingt*20;

       dix = monnaie/10;
       monnaie = monnaie - dix*10;

       cinq = monnaie/5;
       monnaie = monnaie - cinq*5;

       deux = monnaie/2;
       monnaie = monnaie - deux*2;

       printf("On doit vous rendre %d billets de 20, %d billets de 10, %d billets de 5, %d pieces de 2 et %d pieces de 1" , vingt , dix , cinq , deux , monnaie);

   }

return 0;
}
