let biblio = [
  "ASPHYXIE",
  "DYSLEXIQUE",
  "BICYCLETTE",
  "HYPOTHEQUE",
  "RUGBYMAN",
  "COCYCLIQUE",
  "JUXTAPOSER",
  "PATCHWORK",
  "HYPOTHEQUER",
  "MYTHOLOGIE",
  "PSYCHANALYSER",
  "CRYPTOGRAPHIE",
  "HYPOCHONDRIAQUE",
  "DACTYLOGRAPHIER",
];
let motATrouver;
let motAffiche = "";
let lettre;
let lettresJouees = "";
let pendu = "Vies : O O O O O O O O   ";

let input = document.querySelector("#lettre");
let formulaire = document.querySelector("#formulaire");
let affichageMot = document.querySelector("#motADeviner");
let lettresDonnees = document.querySelector(".lettresDonnees");
let affichePendu = document.querySelector("#pendu");
let imagePendu = document.querySelector("#image");

function game() {
  imagePendu.style.display = "none";
  tirerMot();
  motAAfficher();
  afficheMot();
  afficherPendu();
  entrerLettre();
}

function tirerMot() {
  let alea = Math.floor(Math.random() * biblio.length);
  motATrouver = biblio[alea];
}

function motAAfficher() {
  let longueurMot = motATrouver.length;
  let derniereLettre = motATrouver[longueurMot - 1];
  motAffiche = motATrouver[0].concat(
    "",
    derniereLettre.padStart(longueurMot - 1, "_")
  );
}

function afficheMot() {
  affichageMot.textContent = motAffiche;
}

function remplaceLettre(lettre) {
  let tabMotATrouver = motATrouver.split("");
  let tabMotAffiche = motAffiche.split("");

  if (
    motATrouver.slice(1, motATrouver.length - 1).includes(lettre) &&
    !lettresJouees.includes(lettre)
  ) {
    tabMotATrouver.forEach((element, index) => {
      if (element === lettre) {
        tabMotAffiche[index] = lettre;
      }
    });
    motAffiche = tabMotAffiche.join("");
    afficheMot();
  } else {
    afficherPendu();
  }
  afficheLettresJouees();

  if (!motAffiche.includes("_")) {
    affichageMot.style.color = "rgb(153, 8, 153)";
    let timer = setTimeout(gagner, 1000); // obligé de mettre un timer sinon alert se declenche trop vite !?
  }
  console.log(pendu.length);
  if (pendu.length == 7) perdre();
}

function afficheLettresJouees() {
  if (lettresJouees.includes(lettre)) {
    lettresDonnees.style.color = "red";
  } else {
    lettresJouees = lettresJouees.concat(" ", lettre);
    lettresDonnees.textContent = lettresJouees;
  }
}

function afficherPendu() {
  pendu = pendu.slice(0, pendu.length - 2);
  affichePendu.textContent = pendu;
}

function entrerLettre() {
  formulaire.addEventListener("submit", ecoute);
}

function ecoute(e) {
  e.preventDefault();
  lettresDonnees.style.color = "white";

  if (
    !(
      (input.value >= "a" && input.value <= "z") ||
      (input.value >= "A" && input.value <= "Z")
    ) ||
    input.value == ""
  ) {
    input.style.borderColor = "red";
    input.value = "";
  } else {
    input.style.borderColor = "orangered";
    lettre = input.value.toUpperCase();

    input.value = "";
    remplaceLettre(lettre);
  }
}

function gagner() {
  if (confirm("Rejouer ?")) {
    motAffiche = "";
    lettresJouees = "";
    pendu = "Vies : O O O O O O O O   ";
    affichePendu.textContent = pendu;
    lettresDonnees.textContent = "";
    affichageMot.style.color = "rgb(13, 58, 61)";

    game();
  } else {
    affichageMot.textContent = "A bientôt...";
    // formulaire.submit = null;
    ////    ne fonctionne pas , pourquoi ? formulaire.removeEventListener("submit", ecoute);
    // la fenetre alert a arranger le pb mais pk ca ne marchait pas ?
  }
}

function perdre() {
  imagePendu.style.display = "block";
  affichageMot.style.color = "red";
  let timer = setTimeout(gagner, 1000); // pareil ici , sans timer , confirm passe avant ?!
}

game();
