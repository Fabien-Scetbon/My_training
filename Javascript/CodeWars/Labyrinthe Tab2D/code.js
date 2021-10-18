
function mazeRunner(maze, directions) {

    let actualPosition = [0,0];

    function positionDepart(maze) {
        
    }


    function deplacement(actualPosition , direction) {


        switch (direction) {
            case 'N':
                actualPosition[0] --; 
                break;
            case 'S':
                actualPosition[0] ++;
                break;
            case 'E':
                actualPosition[1] ++;
                break;
            case 'O':
                actualPosition[1] --;
                break;
        }
        return actualPosition;
    }
    
    function positionConvert(position) {

    }
  }


  switch (expr) {
    case 'Oranges':
      console.log('Oranges are $0.59 a pound.');
      break;
    case 'Mangoes':
    case 'Papayas':
      console.log('Mangoes and papayas are $2.79 a pound.');
      // expected output: "Mangoes and papayas are $2.79 a pound."
      break;
    default:
      console.log(`Sorry, we are out of




maze = [[1,1,1,1,1,1,1],
        [1,0,0,0,0,0,3],
        [1,0,1,0,1,0,1],
        [0,0,1,0,0,0,1],
        [1,0,1,0,1,0,1],
        [1,0,0,0,0,0,1],
        [1,2,1,0,1,0,1]]

    direction = ["N","N","N","N","N","E","E","E","E","E"]