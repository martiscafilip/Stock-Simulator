let inputname=document.getElementsByClassName("newnamechange")[0];
let sendBtn=document.getElementById("newname3");
sendBtn.addEventListener('click',updateNamePrev);
let updatename=0;


function updateSessionCurrency(arrayInfo) {
    if (arrayInfo["r_session_currency"] == "USD") {
    fetch("http://localhost:3000/app/controllers/updateCurrency.php", {
      method: "POST",

      body: JSON.stringify({
        functionname: "changeCurrencyToUSD"
      }),

      headers: new Headers({
        "Content-Type": "application/json", // sent request
        "Accept": "application/json",
      }),
    })
      .then((response) => response.json())

      .then((json) => {
        
          console.log("usd >");
          var calculbalance = json["result"] * arrayInfo["r_balance"];
          var roundedStringbalance = calculbalance.toFixed(3);
          var roundedbalance = Number(roundedStringbalance);
          var calculprofit = json["result"] * arrayInfo["r_profit"];
          var roundedStringprofit = calculprofit.toFixed(3);
          var roundedprofit = Number(roundedStringprofit);
           document.getElementsByName("balance")[0].innerHTML = roundedbalance;
           document.getElementsByName("rank")[0].innerHTML = arrayInfo["r_rank"];
           document.getElementsByName("trades")[0].innerHTML = arrayInfo["r_trades"];
           document.getElementsByName("profit")[0].innerHTML = roundedprofit;

          counterCoinBtn = 0;
      });
  } else {
    console.log("eur >");
    var calculfinalbalance=(Number(arrayInfo["r_balance"])+Number(arrayInfo["r_profit"]));
    document.getElementsByName("balance")[0].innerHTML = arrayInfo["r_balance"];
    document.getElementsByName("rank")[0].innerHTML =  arrayInfo["r_rank"];
    document.getElementsByName("trades")[0].innerHTML =  arrayInfo["r_trades"];
    document.getElementsByName("profit")[0].innerHTML = arrayInfo["r_profit"];
  }
}


const fetchAccountInfos = async (accountnr) => {
  try{
    let infos = await fetch("http://localhost:3000/app/controllers/updateAccount.php", {
      // Adding method type
      method: "POST",

      // Adding body or contents to send
      body: JSON.stringify({
        functionname: "getInfosAccount",
        arg1: accountnr
      }),

      // Adding headers to the request
      headers: new Headers({
        "Content-Type": "application/json", // sent request
        "Accept": "application/json",
      }),
    })
    const resBody=await infos.json();
    return resBody;

  }catch(err){
    console.log(err);
  }
}

function refreshAccount(accountnr){

  fetchAccountInfos(accountnr).then((arrayInfo) => {
    console.log("result :" +arrayInfo+":");
    updateSessionCurrency(arrayInfo);
});
}

function openTrades(){
  location.assign("/public/userTrades/viewTrades");
}

function openInput() {
  updatename=1;
  document.getElementById("newname1").style.display = "block";
  document.getElementById("newname2").style.display = "block";
  document.getElementById("newname3").style.display = "block";
  document.body.addEventListener("click", onClickBodyC);
  console.log("adaugat");
}


function onClickBodyC(e) {
if(updatename===0){
  if (inputname.contains(e.target)) {
    return;
  }
  document.getElementById("newname1").style.display = "none";
  document.getElementById("newname2").style.display = "block";
  document.getElementById("newname3").style.display = "block";
  document.body.removeEventListener("click", onClickBodyC);
}else updatename=0;
}

function updateName(accountnr){
  var name = document.getElementById("newname2").value;
  $('#newname2').val('');
  
  document.getElementById("accountName").innerHTML=name;

  fetch("http://localhost:3000/app/controllers/updateAccount.php", {
      method: "POST",

      body: JSON.stringify({
        functionname: "updateUsername",
        arg1: name,
        arg2: accountnr
      }),

      headers: new Headers({
        "Content-Type": "application/json", // sent request
        "Accept": "application/json",
      }),
    })
      .then((response) => response.json())

      .then((json) => {
       console.log(json);
      }); 
}
