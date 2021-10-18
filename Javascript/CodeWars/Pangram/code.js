function isPangram(string){

    let alphabet = "abcdefghijklmnopqrstuvwxyz";

    string = (string.replace(new RegExp("[^(a-zA-Z)]", "g"), '')).toLowerCase();
    

    // if(string.length < 26) return false;

    for(let i = 0 ; i < 26 ; i++) {
        
        if (!string.includes(alphabet[i])) {
            return false;
        }
       
    }
    return true;
}

// return new Set(string.toLocaleLowerCase().replace(/[^a-z]/gi, '').split('')).size === 26;


