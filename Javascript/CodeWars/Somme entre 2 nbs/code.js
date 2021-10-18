function getSum( a,b )
{
   let x,y;
  if(a === b) return a;
  
  x = Math.min(a,b);
  y = Math.max(a,b);
  let sum = 0;
  for(let i = x ; i < y+1 ; i++) {
    sum +=i;
  }
  return sum;
}

console.log(getSum(4,19));
console.log(getSum(-4,9));