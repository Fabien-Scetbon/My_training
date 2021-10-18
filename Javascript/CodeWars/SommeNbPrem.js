

function sumPrimes(num) {
    let sum = 0;

    for (let i = 2 ; i <= num ; i++) {
    if(testPrime(i)) {
        sum +=i;
    }
    
  }
  return sum;
}
  
 console.log(sumPrimes(2));

function testPrime(number) {
    for (let i = 2 ; i < number ; i++) {
        console.log(number,i);
        if(number%i == 0) {
            return false;
        }  
    }
    return true;
}


