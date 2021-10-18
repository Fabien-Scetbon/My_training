let tabCouleurs = [0];
let i = 0;
let tabJoueur = [];
let interval;
let bonneCouleur = true;

let vert = document.querySelector(".vert");
let rouge = document.querySelector(".rouge");
let bleu = document.querySelector(".bleu");
let jaune = document.querySelector(".jaune");

let score = document.querySelector("#points");
let info = document.querySelector("#info");
info.classList.add("gagne");

function game() {
  ajoutCouleurTab();
  jouerTabCouleurs();

  console.log("nouvo tab de coul " + tabCouleurs);

  vert.addEventListener("click", clickVert);

  rouge.addEventListener("click", clickRouge);

  bleu.addEventListener("click", clickBleu);

  jaune.addEventListener("click", clickJaune);
} // fin fct game

function ajoutCouleurTab() {
  // deux couleurs successives differentes
  let nbAlea;
  nbAlea = Math.floor(Math.random() * 4) + 1;
  console.log(tabCouleurs);

  if (tabCouleurs.length == 1) {
    tabCouleurs.splice(tabCouleurs.length - 1, 0, nbAlea);
  } else {
    while (nbAlea == tabCouleurs[tabCouleurs.length - 2]) {
      nbAlea = Math.floor(Math.random() * 4) + 1;
    }
    tabCouleurs.splice(tabCouleurs.length - 1, 0, nbAlea);
  }
  console.log("derniere couleur" + tabCouleurs[tabCouleurs.length - 1]);
}

function jouerTabCouleurs() {
  interval = setInterval(jouerCouleurs, 1000);
}

function jouerCouleurs() {
  if (i == tabCouleurs.length - 1) stop();
  let couleur = tabCouleurs[i];
  console.log(i + " " + couleur);

  resetCouleurs();
  switch (couleur) {
    case 0:
      resetCouleurs();
      break;
    case 1:
      vert.classList.remove("none");
      vert.classList.add("vertOn");
      break;
    case 2:
      rouge.classList.remove("none");
      rouge.classList.add("rougeOn");
      break;
    case 3:
      bleu.classList.remove("none");
      bleu.classList.add("bleuOn");
      break;
    case 4:
      jaune.classList.remove("none");
      jaune.classList.add("jauneOn");
      break;
  }
  i++;
}

function resetCouleurs() {
  vert.classList.add("none");
  rouge.classList.add("none");
  bleu.classList.add("none");
  jaune.classList.add("none");
}

function stop() {
  clearInterval(interval);
}

function clickVert() {
  tabJoueur.push(1);
  resetCouleurs();
  vert.classList.remove("none");
  vert.classList.add("vertOn");
  console.log("tab joueur " + tabJoueur);
  bonneCouleur = compareTab();
  console.log(bonneCouleur);
  tourSuivant();
}

function clickRouge() {
  tabJoueur.push(2);
  resetCouleurs();
  rouge.classList.remove("none");
  rouge.classList.add("rougeOn");
  console.log("tab joueur " + tabJoueur);
  bonneCouleur = compareTab();
  console.log(bonneCouleur);
  tourSuivant();
}
function clickBleu() {
  tabJoueur.push(3);
  resetCouleurs();
  bleu.classList.remove("none");
  bleu.classList.add("bleuOn");
  console.log("tab joueur " + tabJoueur);
  bonneCouleur = compareTab();
  console.log(bonneCouleur);
  tourSuivant();
}
function clickJaune() {
  tabJoueur.push(4);
  resetCouleurs();
  jaune.classList.remove("none");
  jaune.classList.add("jauneOn");
  console.log("tab joueur " + tabJoueur);
  bonneCouleur = compareTab();
  console.log(bonneCouleur);
  tourSuivant();
}

function compareTab() {
  return tabJoueur.every((element, index) => {
    return element == tabCouleurs[index];
  });
}

function tourSuivant() {
  if (bonneCouleur && tabJoueur.length == tabCouleurs.length - 1) {
    score.textContent = tabJoueur.length;
    i = 0;
    reinitialiserTabJoueur();
    game();
  } else if (!bonneCouleur) {
    endGame();
  }
}

function reinitialiserTabJoueur() {
  tabJoueur.splice(0, tabJoueur.length);
}

function endGame() {
  resetCouleurs();

  vert.removeEventListener("click", clickVert);
  rouge.removeEventListener("click", clickRouge);
  bleu.removeEventListener("click", clickBleu);
  jaune.removeEventListener("click", clickJaune);
  info.classList.remove("gagne");
  info.classList.add("perdu");
  i = 0;
  jouerTabCouleurs();
  let bouton = document.querySelector("button");
  bouton.addEventListener("click", rejouer);
}

function rejouer() {
  tabCouleurs = [0];
  i = 0;
  tabJoueur = [];
  bonneCouleur = true;
  score.textContent = "0";
  info.classList.add("gagne");
  info.classList.remove("perdu");

  game();
}

game();
