class Student {
    constructor(name, fives, tens, twenties) {
      this.name = name;
      this.fives = fives;
      this.tens = tens;
      this.twenties = twenties;
    }
    
    calculTotal() {
        return this.fives * 5 + this.tens * 10 + this.twenties * 20 ;
    }

  }

var mike = new Student('Mike' , 1 , 0 , 2);
var paul = new Student('Paul' , 1 , 3 , 0);
var jean = new Student('Jean' , 0 , 1 , 2);
var fred = new Student('Fred' , 0 , 1 , 1);

let students = [mike , paul , jean , fred] ;
let totaux = [];

totaux = students.map( (element) => {
return element.calculTotal();
});

let max = Math.max(...totaux);


console.log(totaux);
console.log(max);

function mostMoney(students) {
    if (totaux.length == 1) {
        return students[0].name;
    } else if (totaux[0] == totaux[1]) {
        return 'all';
    } else {
        return students[totaux.indexOf(max)].name;
    }
    


}

console.log(mostMoney(students));







  