let inputname = document.getElementsByClassName("newnamechange")[0];
let sendBtn = document.getElementById("newname3");
sendBtn.addEventListener('click', updateNamePrev);
let updatename = 0;


function updateSessionCurrency(arrayInfo) {
    if (arrayInfo["r_session_currency"] == "EUR") {
        fetch("http://stock-simulator-hodler.herokuapp.com/app/controllers/updateCurrency.php", {
                method: "POST",

                body: JSON.stringify({
                    functionname: "changeCurrencyToEUR"
                }),

                headers: new Headers({
                    "Content-Type": "application/json", // sent request
                    "Accept": "application/json",
                }),
            })
            .then((response) => response.json())

        .then((json) => {

            console.log("eur >");
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
            document.getElementsByName("cashavbl")[0].innerHTML = arrayInfo["r_cashavbl"] * json["result"];

            counterCoinBtn = 0;
        });
    } else {
        console.log("usd >");
        var calculfinalbalance = (Number(arrayInfo["r_balance"]) + Number(arrayInfo["r_profit"]));

        var roundedStringbalance = arrayInfo["r_balance"].toFixed(3);
        var roundedbalance = Number(roundedStringbalance);
        document.getElementsByName("balance")[0].innerHTML = roundedbalance;
        document.getElementsByName("rank")[0].innerHTML = arrayInfo["r_rank"];
        document.getElementsByName("trades")[0].innerHTML = arrayInfo["r_trades"];

        var roundedStringprofit = arrayInfo["r_profit"].toFixed(3);
        var roundedprofit = Number(roundedStringprofit);
        document.getElementsByName("profit")[0].innerHTML = roundedprofit;


        document.getElementsByName("cashavbl")[0].innerHTML = arrayInfo["r_cashavbl"];
    }
    var calculperformance = arrayInfo["r_performance"];
    var roundedStringperformance = calculperformance.toFixed(2);
    var roundedperformance = Number(roundedStringperformance);
    document.getElementsByName("performance")[0].innerHTML = roundedperformance + " %";
}


const fetchAccountInfos = async(accountnr) => {
    try {
        let infos = await fetch("http://stock-simulator-hodler.herokuapp.com/app/controllers/updateAccount.php", {
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
        const resBody = await infos.json();
        return resBody;

    } catch (err) {
        console.log(err);
    }
}

function refreshAccount(accountnr) {

    fetchAccountInfos(accountnr).then((arrayInfo) => {
        console.log("result :" + arrayInfo + ":");
        updateSessionCurrency(arrayInfo);
    });
}

function openTrades() {
    location.assign("/public/userTrades/viewTrades");
}

function openInput() {
    updatename = 1;
    document.getElementById("newname1").style.display = "block";
    document.getElementById("newname2").style.display = "block";
    document.getElementById("newname3").style.display = "block";
    document.body.addEventListener("click", onClickBodyC);
    console.log("adaugat");
}


function onClickBodyC(e) {
    if (updatename === 0) {
        if (inputname.contains(e.target)) {
            return;
        }
        document.getElementById("newname1").style.display = "none";
        document.getElementById("newname2").style.display = "block";
        document.getElementById("newname3").style.display = "block";
        document.body.removeEventListener("click", onClickBodyC);
    } else updatename = 0;
}

function updateName(accountnr) {
    var name = document.getElementById("newname2").value;
    document.getElementById("newname2").value = '';

    document.getElementById("accountName").innerHTML = name;

    fetch("http://stock-simulator-hodler.herokuapp.com/app/controllers/updateAccount.php", {
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