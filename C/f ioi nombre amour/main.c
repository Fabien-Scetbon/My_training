#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int sommeRed(int nombre);
int nbAm(char nom[] , int lon);

int main()
{
   int i;
   int nombre;
   int nbAmour;

   char nom[50];
   int lon;

   for(i = 0 ; i < 2 ; i++ )
   {
       scanf("%s", nom);
       lon = strlen(nom);
       nombre = nbAm(nom , lon);
       nbAmour = sommeRed(nombre);
       printf("%d " , nbAmour);

   }
   return 0;
 }

 int sommeRed(int nombre)
 {
     int rest;
     int somme = 0;

     while(nombre >= 10)
     {
        while(nombre != 0)
        {
            rest = nombre%10;
            somme += rest;
            nombre = nombre/10;
        }
        nombre = somme;
        somme = 0;
     }
     return nombre;
 }

 int nbAm(char nom[] , int lon)
 {
     int i;
     int somme = 0;

     for(i = 0 ; i < lon ; i++)
     {
         somme += nom[i] - 65;
     }

     return somme;
 }
