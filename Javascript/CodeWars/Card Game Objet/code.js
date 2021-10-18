function whoWon(players, extraCard, extraTakers) {
  let resultats = [];
  let somme = (total, carte) => parseInt(total) + parseInt(carte);

  for (player in players) {
    let cardsPlayer = players[player].split(",");

    console.log("player " + player);
    console.log(cardsPlayer);

    extraTakers.includes(player) ? cardsPlayer.push(extraCard) : 0;

    console.log("extra " + extraTakers.includes(player));
    console.log(cardsPlayer);

    let scorePlayer = cardsPlayer.reduce(somme);
    console.log("scorePlayer " + scorePlayer);
    let resultatPlayer = [player, scorePlayer];
    console.log(resultatPlayer);

    resultats.push(resultatPlayer);
  }
  resultats.sort(function (a, b) {
    return b[1] - a[1];
  });
  console.log(resultats);
  return resultats;
}

const players = {
  Ben: "5, 3",
  Amy: "1, 3",
  Sam: "3, 10",
  Max: "4 , 2",
};

console.log(whoWon(players, 3, ["Ben", "Amy", "Max"]));

//should return [["Sam", 13], ["Amy", 10], ["Ben", 10]];
