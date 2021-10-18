function longestRepetition(string) {
  let max = 0;
  let car = "";

  for (let indice = 1; indice <= string.length; indice++) {
    let compteur = 1;

    if (string[indice] === string[indice - 1]) compteur++;
    else {
      if (compteur > max) {
        max = compteur;
        car = string[indice - 1];
      }
      compteur = 1;
    }
  }

  return [car, max];
}

console.log(longestRepetition("cbdeuuu900"));
