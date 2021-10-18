function pascal(depth) {
  let result = [[1], [1, 1]];
  let level = 2;
  let etage = [1, 1];
  if (depth === 1) return [[1]];
  if (depth == 2) return [[1], [1, 1]];
  while (level < depth) {
    let nextEtage = [1];
    for (let index = 0; index < etage.length - 1; index++) {
      nextEtage.push(etage[index] + etage[index + 1]);
    }
    nextEtage.push(1);
    result = result.concat([nextEtage]);
    etage = nextEtage.splice(nextEtage);
    level++;
  }
  return result;
}

console.log(pascal(3));

/*





    [[1], [1,1], [1,2,1], [1,3,3,1], [1,4,6,4,1]]

              [1]
            [1   1]
          [1   2   1]
        [1   3   3   1]*/
