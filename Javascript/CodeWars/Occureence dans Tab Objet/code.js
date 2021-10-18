function highestRank(array) {
  let compteur = {};

  array.forEach((nombreTeste) => {
    compteur.hasOwnProperty(nombreTeste)
      ? compteur[nombreTeste]++
      : (compteur[nombreTeste] = 1);
  });

  let maxOccurence = Math.max(...Object.values(compteur));

  let resultatsPossibles = [];
  for (let nombre in compteur) {
    //console.log("cle = " + nombre + " occur " + compteur[nombre]);
    if (compteur[nombre] == maxOccurence) {
      //console.log(nombre);
      resultatsPossibles.push(Number(nombre));
    }
  }
  //console.log(resultatsPossibles);
  //console.log(Math.max(...resultatsPossibles));
  return Math.max(...resultatsPossibles);
}

console.log(highestRank([12, 10, 5, 5, 5, 12, 10]));

// SOLUTION
//return arr.sort((a,b)=>arr.filter(i=>i===b).length - arr.filter(i=>i===a).length)[0];

/*function highestRank(arr){
    return arr.sort(function(a,b){
        return (arr.filter(function(v){ return v===a }).length)-(arr.filter(function(v){ return v===b }).length)||a-b
    }).pop();
}  */
