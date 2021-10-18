#include <stdio.h>
#include <stdlib.h>



int main()
{
    int nbMinutesTotal = 0 , nbHeures = 0 , nbMinutes = 0 ;

    printf("Nombre de minutes ?\n\n");
    scanf("%d",&nbMinutesTotal);

    nbHeures = nbMinutesTotal / 60 ;
    nbMinutes = nbMinutesTotal % 60 ;

    printf("Nombre de minutes = %d = %d heures et %d minutes" , nbMinutesTotal , nbHeures , nbMinutes) ;

    return 0;



}
