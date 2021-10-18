#include <stdio.h>
#include <stdlib.h>



int main()
{
   int i = 5;

   printf("%d\n" , i);
   scanf("%d" ,&i);
   printf("%d\n " , i);

   char a = 'g';

   printf("%c\n" , a);
   scanf(" %c" ,&a);    /*LE PROBLEME EST QUE scanf a garde en memoire le \n de la touche entree donc on met un " " avant %c*/
   printf("%c\n" , a);

    return 0;
}
