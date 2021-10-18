#include <stdio.h>
#include <stdlib.h>



void ajoumax(int tab1[] , int tab2[] , int tailleTab);
void afficheTab(int tab[] , int tailleTab);

int main()
{
   int nbGren;
   int nbTour;
   int noGren;
   int distSo;
   int max = 0;
   int indiceMax;
   int i = 0;
   int win = 1;

   scanf("%d %d", &nbGren , &nbTour);
   int distParcouru[100] = {0};
   int nbTourDevan[100] = {0};

   for(i = 0 ; i < nbTour - 1 ; i++)
   {
      scanf("%d %d", &noGren , &distSo);
      distParcouru[noGren - 1] = distParcouru[noGren - 1] + distSo;

      ajoumax( distParcouru , nbTourDevan , nbGren);

      afficheTab(distParcouru , nbGren);
      afficheTab(nbTourDevan , nbGren);

   }
    for(i = 0 ; i < nbGren ; i++)
        {
       if (nbTourDevan[i] > max)
            {
            max = nbTourDevan[i];
            indiceMax = i;
            }
        }
    i = 0;
    while(nbTourDevan[i] == max && i != indiceMax)
    {
      win = 0;
      i++;
    }



    if(win == 1) printf("%d" , indiceMax + 1 );
    else printf("%d" , i + 1);


 return 0;
 }

void ajoumax(int tab1[] , int tab2[] , int tailleTab)
 {
    int maxi = 0;
    int i;
    int indiceMax;
    int vrai = 0;

    for(i = 0 ; i < tailleTab ; i++)
    {
       if (tab1[i] > maxi)
       {
          maxi = tab1[i];
          indiceMax = i;
       }
    }

    for(i = 0 ; i < tailleTab ; i++)
    {
       if (tab1[i] == maxi && i != indiceMax)
       {
          vrai = 0;
          break;
       }
       else vrai = 1;
    }
     if (vrai == 1) tab2[indiceMax]++;

 }

void afficheTab(int tab[] , int tailleTab)
{
    int i;
    for(i = 0; i < tailleTab ; i++)
    {
        printf("%d ", tab[i]);
    }
        printf("\n\n");
}





