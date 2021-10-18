function winners(player1, player2, player3, croupier, deck) {
  let resultat = [];
  function blackJack(player) {
    return player.includes("10") && player.includes("A") && player.length == 2;
  }

  function cardValue(card) {
    let value = "JQK".includes(card) ? 10 : Number(card);
    return value;
  }

  function totalPlayerNoAs(player) {
    let playerScore = 0;
    for (let card of player) {
      playerScore += card == "A" ? 0 : cardValue(card);
    }
    return playerScore;
  }

  function totalPlayerAs(player) {
    if (blackJack(player)) return 100;
    let totalPlayer = totalPlayerNoAs(player);
    for (let card of player) {
      if (card == "A" && totalPlayer < 11) {
        totalPlayer += 11;
      } else if (card == "A" && totalPlayer >= 11) {
        totalPlayer += 1;
      }
    }
    return totalPlayer;
  }

  function totCroupier(croupier, deck) {
    if (blackJack(croupier)) return 100;
    let totalCroupier = totalPlayerAs(croupier);
    let indiceDeck = 0;

    //console.log("totcroup " + totalCroupier);
    //console.log("indice " + indiceDeck);
    //console.log("carteDesk " + deck[indiceDeck]);

    if (totalCroupier >= 17) return totalCroupier;
    else {
      while (totalCroupier < 21) {
        if (totalCroupier < 17 && deck[indiceDeck] == "A") {
          totalCroupier += totalCroupier + 11 <= 21 ? 11 : 1;
          //console.log("as " + totalCroupier);
          if (totalCroupier >= 17) return totalCroupier;
        } else {
          totalCroupier += cardValue(deck[indiceDeck]);
          //console.log("pas as " + totalCroupier);
          if (totalCroupier >= 17) return totalCroupier;
        }
        indiceDeck++;
      }
    }
  }

  function addScorePlayer(player, resultat) {
    resultat.push(totalPlayerAs(player));
    return resultat;
  }

  function tabResultats(player1, player2, player3, croupier, deck, resultat) {
    addScorePlayer(player1, resultat);
    addScorePlayer(player2, resultat);
    addScorePlayer(player3, resultat);
    resultat.push(totCroupier(croupier, deck));
    return resultat;
  }

  function solution(resultat) {
    let tabSolution = [];
    //console.log(resultat);
    if (resultat[3] > 21 && resultat[3] < 100) resultat[3] = 0;
    for (let indicePlayer = 0; indicePlayer < 3; indicePlayer++) {
      if (
        resultat[indicePlayer] >= resultat[3] &&
        resultat[indicePlayer] < 22
      ) {
        tabSolution.push(`Player ${indicePlayer + 1}`);
      }
    }
    //console.log(resultat);
    //console.log(tabSolution);
    return tabSolution;
  }

  return solution(
    tabResultats(player1, player2, player3, croupier, deck, resultat)
  ).join(", ");
}

// console.log("black " + blackJack(["10", "A"]));
//console.log("total sans As " + totalPlayerNoAs(["5", "2"]));
//console.log("total Avec As " + totalPlayerAs(["5", "2"]));
//console.log("croupier " + totCroupier(["K", "5", "A"], ["K", "3", "K"]));
// solution([27, 20, 13, 23]);

console.log(
  winners(
    ["J", "A"],
    ["Q", "A"],
    ["10", "A"],
    ["K", "A"],
    ["J", "4", "10", "2", "A", "2", "A", "3", "5"]
  )
);
