function updateSessionCurrency(arrayInfo) {

    if (arrayInfo["r_session_currency"] == "USD") {
    fetch("http://localhost:3000/app/controllers/updateCurrency.php", {
      method: "POST",

      body: JSON.stringify({
        functionname: "changeCurrencyToUSD",
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
           document.getElementsByName("balance")[0].innerHTML = roundedbalance;
           document.getElementsByName("rank")[0].innerHTML = arrayInfo["r_rank"];
           document.getElementsByName("trades")[0].innerHTML = arrayInfo["r_trades"];
           document.getElementsByName("profit")[0].innerHTML = arrayInfo["r_profit"];

          counterCoinBtn = 0;
      });
  } else {
    console.log("eur >");
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
    updateSessionCurrency(arrayInfo);
});
}