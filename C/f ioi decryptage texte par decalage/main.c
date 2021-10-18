#include <stdio.h>
#include <string.h>
#include <ctype.h>
#include <stdbool.h>

int decalagePair(int numeroPage);
int decalageImpair(int numeroPage);
char decalagePositif(char page , int decal);
char decalageNegatif(char car , int decal);

int main()
{
    int nbPages;
    scanf(" %d" , &nbPages);

    char page[1001];
    int numeroPage;

    int lon;
    int div;
    int decal;
    char car;

    for(numeroPage = 2 ; numeroPage < nbPages + 1 ; numeroPage++)
    {
        scanf(" %[^\n]", page);
        lon = strlen(page);

        div = numeroPage%2;

        for(int nocar = 0 ; nocar < lon ; nocar++)
        {
            if( isalpha(page[nocar]) )
            {
                car = tolower(page[nocar]);

                 switch(div)
                 {
                 case 0:
                    decal = decalagePair(numeroPage);
                    /*printf("decal pair %d\n" , decal);*/
                    car = decalagePositif(car , decal);
                    /*printf("car pair %c\n" , car);*/
                 break;

                 case 1:
                    decal = decalageImpair(numeroPage);
                    /*printf("decal impair %d\n" , decal);*/
                    car = decalageNegatif(car , decal);
                   /* printf("car impair %c\n" , car);*/
                 break;
                 }

                if(isupper(page[nocar])) printf("%c" , toupper(car));
                else printf("%c" , car);
            }
            else printf("%c" , page[nocar]);
        }

     printf("\n");
    }


 return 0;

}

int decalagePair(int numeroPage)
   {
       int decalage;
       decalage = 3 * numeroPage;
       return decalage;
   }

int decalageImpair(int numeroPage)
   {
       int decalage;
       decalage = -5 * numeroPage;
       return decalage;
   }

char decalagePositif(char car , int decal)
{
    /*printf("avant %c\n" , car);*/
    if( ((car - 'a') - decal)%26 >=0 ) return car - decal;
    else return ('z' + 1 + ((car - 'a') - decal)%26);
}

char decalageNegatif(char car , int decal)
{
    car = ( ( (car - 'a') - decal)%26 + 'a');
    /*printf("decal impair %d car obtenu %c\n" , decal , car);*/
    return car;
}



