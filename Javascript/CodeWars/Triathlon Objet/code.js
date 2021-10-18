function iTri(distanceParcourue) {
  let distanceRestante = (140.6 - distanceParcourue).toFixed(2);

  if (distanceParcourue == 0) {
    return "Starting Line... Good Luck!";
  } else if (distanceParcourue > 0 && distanceParcourue < 2.4) {
    return { Swim: distanceRestante + " to go!" };
  } else if (distanceParcourue >= 2.4 && distanceParcourue < 114.4) {
    return { Bike: distanceRestante + " to go!" };
  } else if (distanceParcourue > 114.4 && distanceParcourue < 130.6) {
    return { Run: distanceRestante + " to go!" };
  } else if (distanceParcourue > 130.6 && distanceParcourue < 140.6) {
    return { Run: "Nearly there!" };
  } else return "You're done! Stop running!";
}

console.log(iTri(1));
