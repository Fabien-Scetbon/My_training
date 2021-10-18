function inArray(array1,array2){

    let resultat =[];
    
    for(let i=0 ; i < array1.length ; i++) {
        for(let j=0 ; j < array2.length ; j++) {
            if (array2[j].includes(array1[i])) {
                resultat.push(array1[i]);
                break;
            }
        }
    }
    
    return resultat.sort();
}
    
//console.log(inArray(["live", "strong", "arp"],["live", "alive", "harp", "sharp", "armstrong"]));

 
function inArray(a1,a2){
    return a1.filter(sub => a2.some(whole => whole.includes(sub)))
  }

  








   