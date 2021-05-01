
//const idname = document.getElementById('helper').getAttribute('data-name');
//console.log(idname);



const loader = document.getElementById("loader");


$(document).ready(function() {
    //Preloader
    var preloaderFadeOutTime = 5000;
    function hidePreloader() {
    var preloader = $('.loader');
    preloader.fadeOut(preloaderFadeOutTime);
    }
    hidePreloader();
    });


//extra funcs //is loading
const showLadingSpinner = () => {
    loader.hidden = false;
    quoteContainer.hidden = true;
  };
  
  // loading complete
  const hideLoadingSpinner = () => {
    loader.hidden = true;
    quoteContainer.hidden = false;
  };


function calAmt1(rate1){
    var qty1 = document.getElementById("qty1").innerHTML; //normal span tag
    var rate1 = document.getElementById("rate1").value; //input tag
    var amt2 = document.getElementById("amt2").value;
    var total1 = document.getElementById("total1").value;
    var amt1 = 1;
    var total1 = 1;
    qty1 = parseInt(qty1); //from string to num
    rate1 = parseInt(rate1);
    amt2 = parseInt(amt2); //from string to num
    total1 = parseInt(total1);
    amt1 = qty1*rate1;
    
    document.getElementById("amt1").value = amt1; //place inside input tag value
    if(amt2>0){
        document.getElementById("total1").value = (amt1+amt2);
    }
    else{
        document.getElementById("total1").value = amt1;
    }
}

function calAmt2(rate2){
    var qty2 = document.getElementById("qty2").innerHTML; //normal span tag
    var rate2 = document.getElementById("rate2").value; //input tag
    var amt1 = document.getElementById("amt1").value;
    var total2 = document.getElementById("total1").value;
    var amt2 = 1;
    var total1 = 1;
    qty2 = parseInt(qty2); //from string to num
    rate2 = parseInt(rate2);
    amt1 = parseInt(amt1); //from string to num
    total1 = parseInt(total1);
    amt2 = qty2*rate2;
    document.getElementById("amt2").value = amt2; //place inside input tag value
    if(amt1>0){
        document.getElementById("total1").value = (amt1+amt2);
    }
    else{
        document.getElementById("total1").value = amt2;
    }
    
}


function calAmt3(rate3){
    var qty3 = document.getElementById("qty3").innerHTML; //normal span tag
    var rate3 = document.getElementById("rate3").value; //input tag
   var amt4 = document.getElementById("amt4").value;
   var sst = document.getElementById("sst").value;
   var total2WithSst = document.getElementById("total2WithSst").value;
   total2WithSst = parseInt(total2WithSst);
    qty3 = parseInt(qty3); //from string to num
    rate3 = parseInt(rate3);
    amt4 = parseInt(amt4);
    sst = parseInt(sst);
    amt3 = qty3*rate3;
    document.getElementById("amt3").value = amt3; //place inside input tag value
    if(amt4 > 0){
    document.getElementById("total2").value = (amt3+amt4);
    document.getElementById("sst").value = ((amt3+amt4)*0.13).toFixed(2);
    total2WithSst = (amt3+amt4) + ((amt3+amt4)*0.13);
    document.getElementById("total2WithSst").value = total2WithSst;
}
    else{
    document.getElementById("total2").value = amt3;
    document.getElementById("sst").value = (amt3*0.13).toFixed(2);
    total2WithSst = (amt3) + (amt3*0.13);
    document.getElementById("total2WithSst").value = total2WithSst;
}
 
}


function calAmt4(rate4){
    var qty4 = document.getElementById("qty4").innerHTML; //normal span tag
    var rate4 = document.getElementById("rate4").value; //input tag
    var amt3 = document.getElementById("amt3").value;
    var sst = document.getElementById("sst").value;
    var total2WithSst = document.getElementById("total2WithSst").value;
    qty4 = parseInt(qty4); //from string to num
    rate4 = parseInt(rate4);
    amt3 = parseInt(amt3);
    sst = parseInt(sst);
    total2WithSst = parseInt(total2WithSst);
    amt4 = qty4*rate4;
    document.getElementById("amt4").value = amt4; //place inside input tag value
    if(amt3 > 0){
        document.getElementById("total2").value = (amt3+amt4);
        document.getElementById("sst").value = ((amt3+amt4)*0.13).toFixed(2) ;
        total2WithSst = (amt3+amt4) + ((amt3+amt4)*0.13);
        document.getElementById("total2WithSst").value = total2WithSst;
    }
    else{
        document.getElementById("total2").value = amt4;
        document.getElementById("sst").value = (amt4*0.13).toFixed(2);
        total2WithSst = (amt4) + (amt4*0.13);
        document.getElementById("total2WithSst").value = total2WithSst;
    }
 
}


function calWeeks(week1){
    var week1 = document.getElementById("week1").value;
    var week2 = document.getElementById("week2").value;
    var week3 = document.getElementById("week3").value;
    var week4 = document.getElementById("week4").value;
  //  var weeksTotal = document.getElementById("weeksTotal").value;
    var weeksTotal= 0;
    var w1=0, w2=0, w3=0, w4=0;

 //   week1 = parseInt(week1);
  //  week2 = parseInt(week2);
    //week3 = parseInt(week3);
    //week4 = parseInt(week4);
   // weeksTotal = parseInt(weeksTotal);
   //var isValid = this.validity.valid;
   //var len = this.value.length;
   if (typeof week1 !== "undefined") {
    week1 = parseInt(week1);
    w1 = week1;   
    console.log(week1); 
}

if (typeof week2 !== "undefined") {
    week2 = parseInt(week2);    
    w2 = week2;
    console.log(week2); 
}
if (typeof week3 !== "undefined") {
    week3 = parseInt(week3);   
    w3 = week3; 
    console.log(week3); 
}
if (typeof week4 !== "undefined") {
    week4 = parseInt(week4);   
    w4 = week4; 
    console.log(week4); 
}

weeksTotal = w1 + w2 + w3 + w4;
document.getElementById("weeksTotal").value = weeksTotal;

 
  
}

