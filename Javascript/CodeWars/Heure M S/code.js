function humanReadable(seconds) {
  
    let heure = Math.floor(seconds/3600);
    heure = heure < 10 ? '0' + heure : heure;
    let reste1 = seconds%3600;
  
    let minute = Math.floor(reste1/60);
    minute = minute < 10 ? '0' + minute : minute;
    
    let seconde = reste1%60;
    seconde = seconde < 10 ? '0' + seconde : seconde;
  
    return heure + ':' + minute + ':' + seconde;
  
}

console.log(humanReadable(45689));

// var pad = function(x) { return (x < 10) ? "0"+x : x; }