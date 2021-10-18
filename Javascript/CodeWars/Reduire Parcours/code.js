function dirReduc(arr){ 

    if (arr.length == 1) return arr;
    let result = [];
    let i = 0;
    let j = 1;

            while(i < arr.length - 1) {

                            
                while(j < arr.length) {
                    //console.log("i " + i + ' ' + arr[i]);
                    //console.log("j " + j + ' ' + arr[j]);


                    if( (arr[i] =="NORTH" && arr[j] == "SOUTH") 
                        || (arr[i] =="SOUTH" && arr[j] == "NORTH") 
                        || (arr[i] =="EAST" && arr[j] == "WEST") 
                        || (arr[i] =="WEST" && arr[j] == "EAST") ) {

                    //console.log("match");
                    
                    arr.splice(i,1);
                    arr.splice(j-1,1);
                    //console.log(arr);
                    
                    j = i + 1;
                    
                    }
                
                else j++;
                }
            //console.log("i " + i);
            i++;
            j=i+1;
    
    
            }

    return arr;
        }  



    console.log(dirReduc(['WEST', 'SOUTH' , 'WEST' , 'NORTH' , 'NORTH', 'EAST','NORTH']));