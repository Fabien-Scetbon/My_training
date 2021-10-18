class Person {
    constructor (name) {
        this.name = name;
    }
    greet(you) { 
        return "Hello " + you + ", my name is " + this.name; 
    };
}

var joe = new Person('Joe');
console.log(joe.greet('Kate')); // should return 'Hello Kate, my name is Joe'
console.log(joe.name);           // shoul