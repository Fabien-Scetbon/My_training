#include <stdio.h>
#include <stdlib.h>

int main()
{
    char mot[50] = "maman";
    printf("%s\n" , mot);
    mot[0] = '\0';
    printf("sde %s hgtf\n" , mot);
    return 0;
}
