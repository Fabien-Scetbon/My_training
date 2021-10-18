function plusLongueSuite(suite) {
  let tableau = suite.split("");
  let result = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

  function decompte(suite, indiceDepart) {
    let indice = indiceDepart;
    let occurence = 0;
    while (suite[indice] === suite[indiceDepart]) {
      occurence++;
      indice++;
    }
    return occurence;
  }

  for (i = 0; i < suite.length; i++) {
    let nombreTest = suite[i];
    let occurNbTest = decompte(suite, i);

    occurNbTest > result[suite[i]] ? (result[suite[i]] = occurNbTest) : 0;

    i += result[suite[i]] - 1;
  }

  let max = Math.max(...result);
  result.forEach((element, indice) => {
    if (element >= max) console.log("Resultat : " + indice);
  });
}

plusLongueSuite("12345678888999");
