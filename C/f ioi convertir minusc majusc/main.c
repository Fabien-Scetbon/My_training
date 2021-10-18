#include <stdio.h>
#include <string.h>
#include <ctype.h>

int main()
{
    char ligne[10000];
    int lon;
    int val;
    int i;

    scanf("%[^\n]", ligne);
    lon = strlen(ligne);

    for (i = 0 ; i < lon ; i++)
    {
        val = ligne[i];
        if(val > 122 || val < 97) printf("%c" , ligne[i]);
        else printf("%c" , toupper(ligne[i]) );

    }

return 0;
}
