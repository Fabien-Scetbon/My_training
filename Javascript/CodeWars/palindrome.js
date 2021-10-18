function rot13(str) {
  const long = str.length;

  let finalWord = "";

  for (let i = 0; i < long; i++) {
    if (str[i] < 78) {
      finalWord += str[i] + 13;
    } else {
      finalWord += str[i] - 13;
    }
  }

  return finalWord;
}

console.log(rot13("SERR PBQR PNZC"));
