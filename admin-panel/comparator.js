function dollarToPkr(rate){
    var dollarRate = document.getElementById("dollarRate").value; //input tag
    var abbTotal1 = document.getElementById("abbTotal1").innerHTML; //normal span tag
    var abbTotal2 = document.getElementById("abbTotal2").innerHTML; //normal span tag
    var schneiderTotal1 = document.getElementById("schneiderTotal1").innerHTML; //normal span tag
    var schneiderTotal2 = document.getElementById("schneiderTotal2").innerHTML; //normal span tag
    var siemensTotal1 = document.getElementById("siemensTotal1").innerHTML; //normal span tag
    var siemensTotal2 = document.getElementById("siemensTotal2").innerHTML; //normal span tag
  
    
    var abbTotal1Convert = 1;
    var abbGTotal = 1;
    var schneiderTotal1Convert = 1;
    var schneiderGTotal = 1;
    var siemensTotal1Convert = 1;
    var siemensGTotal = 1;

   /*in case of no submission by abb*/
   if(document.getElementById("abbTotal1").innerText == "Not Submitted")
   {
        document.getElementById("abbTotal1Convert").innerText = "Not Submitted";
        document.getElementById("abbGTotal").innerText = "Not Submitted";
   }
   /*if abb has submitted response, find out his chosen currency */
   else
   {
        dollarRate = parseInt(dollarRate); //str to num
        abbTotal1 = parseInt(abbTotal1); //from string to num
        abbTotal2 = parseInt(abbTotal2); //from string to num
        console.log(document.getElementById("abbcur").innerText);
       if(document.getElementById("abbcur").innerText == "USD")
       {
            abbTotal1Convert = abbTotal1*dollarRate;
            abbGTotal = abbTotal1Convert+abbTotal2;
            document.getElementById("abbTotal1Convert").innerHTML = abbTotal1Convert;
            document.getElementById("abbGTotal").innerHTML = abbGTotal;
       }
   }
    /*in case of no submission by schneider*/
   if(document.getElementById("schneiderTotal1").innerText == "Not Submitted")
   {
        document.getElementById("schneiderTotal1Convert").innerText = "Not Submitted";
        document.getElementById("schneiderGTotal").innerText = "Not Submitted";
   }
   /*if schneider has submitted response, find out his chosen currency */
   else
   {
        dollarRate = parseInt(dollarRate); //str to num
        schneiderTotal1 = parseInt(schneiderTotal1); //from string to num
        schneiderTotal2 = parseInt(schneiderTotal2); //from string to num
       if(document.getElementById("schneidercur").innerText == "USD")
       {
            schneiderTotal1Convert = schneiderTotal1*dollarRate;
            schneiderGTotal = schneiderTotal1Convert+schneiderTotal2;
            document.getElementById("schneiderTotal1Convert").innerHTML = schneiderTotal1Convert;
            document.getElementById("schneiderGTotal").innerHTML = schneiderGTotal;
       }
   }
    /*in case of no submission by siemens*/
   if(document.getElementById("siemensTotal1").innerText == "Not Submitted")
   {
        document.getElementById("siemensTotal1Convert").innerText = "Not Submitted";
        document.getElementById("siemensGTotal").innerText = "Not Submitted";
   }
   /*if siemens has submitted response, find out his chosen currency */
   else
   {
        dollarRate = parseInt(dollarRate); //str to num
        siemensTotal1 = parseInt(siemensTotal1); //from string to num
        siemensTotal2 = parseInt(siemensTotal2); //from string to num
       if(document.getElementById("siemenscur").innerText == "USD")
       {
            siemensTotal1Convert = siemensTotal1*dollarRate;
            siemensGTotal = siemensTotal1Convert+siemensTotal2;
            document.getElementById("siemensTotal1Convert").innerHTML = siemensTotal1Convert;
            document.getElementById("siemensGTotal").innerHTML = siemensGTotal;
       }
   }
}

function euroToPkr(rate){
    var abbTotal1 = document.getElementById("abbTotal1").innerHTML; //normal span tag
    var abbTotal2 = document.getElementById("abbTotal2").innerHTML;
    var schneiderTotal1 = document.getElementById("schneiderTotal1").innerHTML; //normal span 
    var schneiderTotal2 = document.getElementById("schneiderTotal2").innerHTML; //normal span tag
    var siemensTotal1 = document.getElementById("siemensTotal1").innerHTML; //normal span tag
    var siemensTotal2 = document.getElementById("siemensTotal2").innerHTML; //normal span tag
    var euroRate = document.getElementById("euroRate").value; //input tag
    
    var abbTotal1Convert = 1;
    var abbGTotal = 1;
    var schneiderTotal1Convert = 1;
    var schneiderGTotal = 1;
    var siemensTotal1Convert = 1;
    var siemensGTotal = 1;
   /*in case of no submission by abb*/
   if(document.getElementById("abbTotal1").innerText == "Not Submitted")
   {
        document.getElementById("abbTotal1Convert").innerText = "Not Submitted";
        document.getElementById("abbGTotal").innerText = "Not Submitted";
   }
   /*if abb has submitted response, find out his chosen currency */
   else
   {
        euroRate = parseInt(euroRate); //str to num
        abbTotal1 = parseInt(abbTotal1); //from string to num
        abbTotal2 = parseInt(abbTotal2); //from string to num
       if(document.getElementById("abbcur").innerText == "Euro")
       {
            abbTotal1Convert = abbTotal1*euroRate;
            abbGTotal = abbTotal1Convert+abbTotal2;
            document.getElementById("abbTotal1Convert").innerHTML = abbTotal1Convert;
            document.getElementById("abbGTotal").innerHTML = abbGTotal;
       }
   }
    /*in case of no submission by schneider*/
   if(document.getElementById("schneiderTotal1").innerText == "Not Submitted")
   {
        document.getElementById("schneiderTotal1Convert").innerText = "Not Submitted";
        document.getElementById("schneiderGTotal").innerText = "Not Submitted";
   }
   /*if schneider has submitted response, find out his chosen currency */
   else
   {
        euroRate = parseInt(euroRate); //str to num
        schneiderTotal1 = parseInt(schneiderTotal1); //from string to num
        schneiderTotal2 = parseInt(schneiderTotal2); //from string to num
       if(document.getElementById("schneidercur").innerText == "Euro")
       {
            schneiderTotal1Convert = schneiderTotal1*euroRate;
            schneiderGTotal = schneiderTotal1Convert+schneiderTotal2;
            document.getElementById("schneiderTotal1Convert").innerHTML = schneiderTotal1Convert;
            document.getElementById("schneiderGTotal").innerHTML = schneiderGTotal;
       }
   }
    /*in case of no submission by siemens*/
   if(document.getElementById("siemensTotal1").innerText == "Not Submitted")
   {
        document.getElementById("siemensTotal1Convert").innerText = "Not Submitted";
        document.getElementById("siemensGTotal").innerText = "Not Submitted";
   }
   /*if siemens has submitted response, find out his chosen currency */
   else
   {
        euroRate = parseInt(euroRate); //str to num
        siemensTotal1 = parseInt(siemensTotal1); //from string to num
        siemensTotal2 = parseInt(siemensTotal2); //from string to num
       if(document.getElementById("siemenscur").innerText == "Euro")
       {
            siemensTotal1Convert = siemensTotal1*euroRate;
            siemensGTotal = siemensTotal1Convert+siemensTotal2;
            document.getElementById("siemensTotal1Convert").innerHTML = siemensTotal1Convert;
            document.getElementById("siemensGTotal").innerHTML = siemensGTotal;
       }
   }
}
