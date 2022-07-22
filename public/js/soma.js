//função criada por causa do problema de somas das casas decimais por problema de precisão, por exemplo 0,9+0,1 == 0,99999...
function round (num1,num2) {
    if(num1==''){
        return num2;
    }
    else if(num2==''){
        return num1;
    }else{
        var ArrayNum1 = num1.split(".");
        var ArrayNum2 = num2.split(".");
        var decimal = parseInt(ArrayNum1[1])+parseInt(ArrayNum2[1]);
        if(decimal<1000){
                return parseInt(ArrayNum1[0])+parseInt(ArrayNum2[0])+'.'+decimal;
        }    
        else
            return parseInt((decimal.toString())[0])+parseInt(ArrayNum1[0])+'.'+ (decimal.toString()).slice(1,4);
    } 
    
}