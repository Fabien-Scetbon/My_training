function occurrenceTabNb(tableau) {

    let tabOcc = [];
    for(let i = 0 ; i < Math.max(...tableau) + 1 ; i++) {
        tabOcc[i] = 0;
    }
    
    for (let i of tableau) {
        tabOcc[i]++;
    }
    
}

    occurrenceTabNb([1,2,3,4,1,1,5,2,2,0,1,4,4,3]);

    