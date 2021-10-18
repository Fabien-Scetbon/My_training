function accum(string) {

    const tableau = string.split('');

    let solution ="";

    let rep=1;

    tableau.forEach(lettre => {

        let bloc = "";
        

        for(let i = 1 ; i < rep ; i++) {

            bloc += lettre.toLowerCase();
        }

        bloc = lettre.toUpperCase() + bloc;

        solution += bloc + '-';
        rep++;
    });

    return solution.slice(0,solution.length - 1);

}

// console.log(accum("abaBcdeFg"));

// return s.split('').map((x,i) => x.toUpperCase() + x.toLowerCase().repeat(i)).join('-');