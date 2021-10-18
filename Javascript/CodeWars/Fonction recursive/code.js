function rangeOfNumbers(startNum, endNum) {
  if (startNum == endNum) return [startNum];
  else {
    let result = rangeOfNumbers(startNum, endNum - 1);
    result.push(endNum);
    return result;
  }
}

console.log(rangeOfNumbers(4, 10));
