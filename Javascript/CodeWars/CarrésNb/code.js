function squareDigits(num) {

    const tableau = String(num).split('');

    let tableauCarres = tableau.map(x => x**2);

    reponse = Number(tableauCarres.join(''));

    return reponse;

}

console.log(squareDigits(2576));
