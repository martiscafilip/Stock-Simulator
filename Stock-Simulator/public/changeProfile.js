let profiles = document.getElementsByClassName("profile_avatar");

for(var i = 0; i<profiles.length; i++){
    profiles[i].addEventListener('click',redirect);
}


function redirect(e){
   
    var name = e.path[2].getElementsByClassName("name")[0].innerHTML;

    var data = "name=" + name;
    console.log(data);
    
    location.replace("/app/models/ModifySessionAccount.php?" + data);
} 