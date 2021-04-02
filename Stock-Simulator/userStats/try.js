
let menuBtn = document.getElementsByClassName("menu-button")[0];
let navSlide = document.getElementsByClassName("menu-nav")[0];
let counterPressButton = 0;

console.log(navSlide);
console.log(menuBtn);

menuBtn.addEventListener('click', onClick);

function onClick(){
    
    if(counterPressButton >= 1){
        counterPressButton = 0;
        navSlide.classList.remove('is--open');
        document.body.removeEventListener('click',onClickBody);
        return;
    }
    document.body.addEventListener('click',onClickBody);
    navSlide.classList.add('is--open');
    counterPressButton += 1;
    console.log(counterPressButton);

}

function onClickBody(e){
    console.log(e);
    if(
        navSlide.contains(e.target) ||
        menuBtn.contains(e.target)
    ){
        return;
    }

    navSlide.classList.remove('is--open');
    counterPressButton = 0;
    document.body.removeEventListener('click',onClickBody);
}
