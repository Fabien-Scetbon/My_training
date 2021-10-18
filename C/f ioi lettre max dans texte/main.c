#include <stdio.h>
#include <string.h>
#include <ctype.h>

int main()
{
    char ligne[10000];
    int occur[26] = {0};
    int lon;
    int max = 0;
    int indiceMax;
    int i;

    scanf("%[^\n]", ligne);
    lon = strlen(ligne);

    for (i = 0 ; i < lon ; i++)
    {
       ligne[i] = tolower(ligne[i]);
       occur[ligne[i] - 97 ]++;
    }

    for(i = 0 ; i < 26 ; i++)
    {
       if(occur[i] > max)
       {
           max = occur[i];
           indiceMax = i;
       }
    }


    printf("%c", indiceMax + 65);

  return 0;
  }
