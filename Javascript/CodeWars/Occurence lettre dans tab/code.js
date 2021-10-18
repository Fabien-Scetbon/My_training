function isValidWalk(walk) {

    let compteur = [0,0,0,0];
  
    if(walk.length != 10 || walk.length ==0)  return false;

    for(let i of walk) {
        
        switch(i) {
            case 'n' : compteur[0]++;
            break;
            case 's' : compteur[1]++;
            break;
            case 'e' : compteur[2]++;
            break;
            case 'w' : compteur[3]++;
            break;
        }
    }

    return  compteur[0] === compteur[1] && compteur[2] === compteur[3];
   
   
  }

 console.log(isValidWalk(['n','s','e','s','n','o','n','s','n','s']));

