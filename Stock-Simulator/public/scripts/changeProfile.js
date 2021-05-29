let profiles = document.getElementsByClassName("avatar_photo");

for (var i = 0; i < profiles.length; i++) {
    profiles[i].addEventListener('click', redirect);
}


var counterPress = 0;
let plusDemo = document.getElementsByClassName("plusBtn_photo")[0];
plusDemo.addEventListener('click',onClick);


let form = document.getElementsByClassName("form")[0];

let createButton = document.getElementById("createButton");
createButton.addEventListener('click',createDemo);





function redirect(e) {

    var name = e.path[2].getElementsByClassName("name")[0].innerHTML;

    var data = "name=" + name;

    location.replace("/app/models/ModifySessionAccount.php?" + data);

}

function createDemo(e){



    var nameDemo = document.getElementById("nameDemo").value;
    var email = document.getElementById("thisEmail").innerText;
    var request = {'name': nameDemo,'email': email};

    // let url = "http://localhost:3000/app/api/createDemoAcc.php";
    fetch("https://stock-simulator-hodler.herokuapp.com/app/api/createDemoAcc.php", {
        method: "POST",
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(request)
    })
    .then(trash => {
        location.reload();
    })



}




function onClick(){
    
    if(counterPress >= 1){
        counterPress = 0;
        form.style.display = "none";
        document.body.removeEventListener('click',onClickBody);
        return;
    }
    document.body.addEventListener('click',onClickBody);
    form.style.display = "flex";
    counterPress += 1;

}

function onClickBody(e){
    if(
        form.contains(e.target) ||
        plusDemo.contains(e.target)
    ){
        return;
    }

    form.style.display = "none";
    counterPress = 0;
    document.body.removeEventListener('click',onClickBody);
}