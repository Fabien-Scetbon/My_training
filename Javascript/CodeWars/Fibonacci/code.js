function fibonacci(n) {

    if(n==0 || n == 1) return n;

    let a = 1;
    let b = 1;
    let c = 0;

    for (let i = 1 ; i < n - 1 ; i++) {
        
        c = a + b;
        a = b;
        b = c;

        console.log("a = " + a + " b = " + b + " c = " + c);
        
    } 

    return c;
}

// fonction trop lente :
/*function fibonacci(n) {
    if(n==0 || n == 1)
        return n;
        console.log("n = " + n + " fib = " + fibonacci(n-1));
    return fibonacci(n-1) + fibonacci(n-2);
}*/



console.log(fibonacci(100));
