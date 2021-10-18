function shoot(partie) {
  let score1 = 0;
  let score2 = 0;
  let scores = { P1: score1, P2: score2 };

  partie.forEach((round) => {
    let coeff = 1;
    //console.log(round);
    for (let player in round[0]) {
      //console.log("player " + player + " tirs " + round[0][player]);

      if (round[1]) coeff = 2;

      switch (round[0][player]) {
        case "XX":
          scores[player] += 2 * coeff;
          break;
        case "XO":
          scores[player] += coeff;
          break;
        case "OX":
          scores[player] += coeff;
          break;
      }
      //console.log("scores après bonus " + scores[player]);
    }
  });

  //console.log("score P1 " + scores["P1"] + " " + typeof scores["P1"]);
  //console.log("score P2 " + scores["P2"] + " " + typeof scores["P2"]);

  return scores["P1"] > scores["P2"]
    ? "Pete Wins!"
    : scores["P1"] < scores["P2"]
    ? "Phil Wins!"
    : "Draw!";
}

console.log(
  shoot([
    [{ P1: "XX", P2: "XO" }, true],
    [{ P1: "XX", P2: "OO" }, false],
    [{ P1: "OX", P2: "OX" }, true],
  ])
);
