// var doc = document.getElementById("listStocksID");

// for (var i = 0; i < doc.childNodes.length; i++) {
//     console.log(doc.childNodes.length);
//     console.log(doc.childNodes[i]. + "hei");
//     doc.childNodes[i].addEventListener('click', clickOn())
// }

var test = document.getElementsByClassName("stocks");

for (var i = 0; i < test.length; i++) {
    console.log(test[i].id);
    test[i].addEventListener("click", clickOn);
}


function clickOn(e) {
    console.log(e.target.id);
}