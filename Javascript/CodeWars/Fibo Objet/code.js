var fibonacci = function(n) {
    if(n==0 || n == 1) return n;

    let tableFibo ={1 : 1 , 2 : 1};

    for (let i = 3 ; i < n + 1 ; i++) {

        tableFibo[i] = tableFibo[i-1] + tableFibo[i-2];
    }


    console.log(tableFibo);
    return tableFibo[n];
   
  
  
  
  
  
    // return fibonacci(n-1) + fibonacci(n-2);
}

console.log(fibonacci(15));