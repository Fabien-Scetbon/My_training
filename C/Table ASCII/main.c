#include <stdio.h>
int main()
{
   // Caractères 0 à 127
   for (int lig = 0; lig < 16; lig = lig + 1)
   {
      for (int col = 0; col < 8; col = col + 1)
      {
         int code = 16 * col + lig;
         char caractere = (char)code;
         if (code < 32)
            caractere = ' ';
         printf("%04d %c  ", code, caractere);
      }
      printf("\n");
   }
}
