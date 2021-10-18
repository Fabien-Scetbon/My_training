function triangle(row) {
  if (row.length == 1) return row;
  else {
    let nextRow = "";
    for (i = 0; i < row.length - 1; i++) {
      let doublon = row[i] + row[i + 1];

      console.log(doublon);
      if (row[i] === row[i + 1]) {
        nextRow += row[i];
      }

      switch (doublon) {
        case "RG":
        case "GR":
          nextRow += "B";
          break;
        case "RB":
        case "BR":
          nextRow += "G";
          break;
        case "BG":
        case "GB":
          nextRow += "R";
          break;
      }
    }
    console.log(nextRow);
    return triangle(nextRow);
  }
}

triangle("RRGBRGBB");
