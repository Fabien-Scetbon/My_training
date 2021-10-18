function sommeLigne(ligne,board) {

  let total = 0;

  for(let j=0 ; j<3 ; j++) {
    total +=board[ligne][j];
  }

  return total;
}

function sommeCol(col,board) {

  let total = 0;

  for(let i=0 ; i<3 ; i++) {
    total +=board[i][col];
  }

  return total;
}

function sommeDiag1(board) {
  let total = 0;
  for(let i=0 ; i<3 ; i++) {
    total += board[i][i];
  }

  return total;
}

function sommeDiag2(board) {
  let total = 0;
  for(let i=0 ; i<3 ; i++) {
    total += board[i][2-i];
  }

  return total;
}

function sommeBoard(board) {
  let total = 0;
  for (let i=0 ; i<3 ; i++) {
    total += sommeLigne(i,board);
  }
  return total;
}

function isSolved(board) {

  //console.log("total " + sommeBoard(board));

    for(let i = 0 ; i<3 ; i++) {
      //console.log(sommeLigne(i,board) );
      //console.log(sommeCol(i,board) );
      //console.log(sommeDiag1(board));
      //console.log(sommeDiag2(board));

      if ( (sommeLigne(i,board) == 3) || (sommeCol(i,board) == 3) 
            || (sommeDiag1(board) == 3) || (sommeDiag2(board) == 3)) 
            return 1;

      else if ( (sommeLigne(i,board) == 6) || (sommeCol(i,board) == 6) 
      || (sommeDiag1(board) == 6) || (sommeDiag2(board) == 6)) 
      return 2;
    
    }

    if ( (sommeBoard(board) = 13) || (sommeBoard(board) = 14 )) return 0;

    return -1;
}

let board = [[1,1,1],
[2,0,2],
[0,2,0]]

board = board.join('-').replace(/,/g,'');

console.log(board);

console.log(isSolved([[1,1,1],
                      [2,0,2],
                      [0,2,0]]));






