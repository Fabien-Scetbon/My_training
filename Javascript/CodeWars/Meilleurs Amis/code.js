function friend(friends){
    let bestFriends =[];

    for(nom of friends) {
      
        if(nom.length === 4) {

            bestFriends.push(nom);
        }
    }

    return bestFriends;
}

console.log(friend(["Ryan", "Kieran", "Mark"]));