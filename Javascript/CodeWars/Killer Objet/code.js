/*function killer(suspectInfo, dead) {

  let solution =[];


  for (let nomSuspect in suspectInfo) {
    dead.forEach((nomDead) => {
      //for (let nomDead of dead) {
      console.log(
        " sus " +
          nomSuspect +
          " nomDead " +
          nomDead +
          " personne " +
          suspectInfo[nomSuspect]
      );

      console.log("dedans " + suspectInfo[nomSuspect].includes(nomDead));

      let rep = suspectInfo[nomSuspect].includes(nomDead);
    });
  }

  
}*/
function killer(suspectInfo, dead) {
  return Object.keys(suspectInfo).find((x) =>
    dead.every((y) => suspectInfo[x].includes(y))
  );
}

console.log(
  killer(
    {
      James: ["Marc", "Jacob", "Bill", "Lucas"],

      Johnny: ["David", "Marc", "Kyle", "Lucas"],

      Peter: ["Bill", "Marc", "Kyle"],
    },

    ["Lucas", "Bill"]
  )
);

/*function killer(suspectInfo, dead) {
  for (let nomDead of dead) {
    for (let nomSuspect in suspectInfo) {
      console.log(
        "nomDead " +
          nomDead +
          " sus " +
          nomSuspect +
          " personne " +
          suspectInfo[nomSuspect]
      );

      console.log("dedans " + suspectInfo[nomSuspect].includes(nomDead));

      if (!suspectInfo[nomSuspect].includes(nomDead)) {
        break;
      } else console.log(nomDead);
    }
  }
}*/

/* SOLUTIONS :
return Object.keys(suspectInfo).find(x => dead.every(y => suspectInfo[x].includes(y)))*/
