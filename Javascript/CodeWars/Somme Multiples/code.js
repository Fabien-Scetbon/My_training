function solution(number){

    if (number<1) return 0;

    let tableau = [];

    for (let i = 1 ; i < number ; i++) {
        

        if (i % 3 === 0 && i%5 !== 0 ) {
            
            
            tableau.push(i);
        }

        if(i % 3 !== 0 && i % 5 === 0 ) {
            
            tableau.push(i);
        
        }

        if(i % 3 === 0 && i % 5 === 0 ) {
            
            tableau.push(i);
        
        }
 
        
    }
  
    let somme = 0;
        for (let i = 0 ; i < tableau.length ; i++) {

            somme +=tableau[i];
            
        }
        return somme;
    
  }
  
 

  

 