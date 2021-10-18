function doubles(string) {
  string = string.split("");

  for (let indiceString = 0; indiceString < string.length - 1; indiceString++) {
    console.log(
      "indice " +
        indiceString +
        " i " +
        string[indiceString] +
        " i + 1 " +
        string[indiceString + 1]
    );
    if (string[indiceString] === string[indiceString + 1]) {
      string[indiceString] = "";
      string[indiceString + 1] = "";
      console.log("match");
      console.log("avant ");
      console.log(string);
      string = string.join("").split("");
      console.log("apres ");
      console.log(string);

      indiceString -= 2;
    }
  }
  return string.join("");
}

console.log(doubles("abbcdeedcrapp"));

// function doubles(s) {
while (/(.)\1/.test(s)) s = s.replace(/(.)\1/, "");
return s;
