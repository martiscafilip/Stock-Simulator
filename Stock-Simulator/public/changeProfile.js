let profiles = document.getElementsByClassName("profile_avatar");

for(var i = 0; i<profiles.length; i++){
    profiles[i].addEventListener('click',redirect);
}


function redirect(e){
    location.replace("/public/trade/trade");
} 