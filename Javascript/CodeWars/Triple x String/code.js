function tripleX(str) {
  let indice = str.search("x");
  if (str[indice + 1] == "x" && str[indice + 2] == "x") {
    return true;
  }
  return false;
}

console.log(tripleX("soft kitty, warm kitty, xxxxx"));
