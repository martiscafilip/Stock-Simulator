autoRefresh();

async function autoRefresh(){
    while(true){
        fetch("http://localhost:3000/app/api/topApi.php", {
                method: "GET"
            })
            .then(resp => {

                console.log(resp);
                return resp.json();
            })
            .then(jsonResp => {
                console.log("Json resp ", jsonResp);
                updateList(jsonResp);
            })
    await sleep(5000);
    }
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function updateList(list){
    let myDiv1 = document.getElementsByClassName("ranking_pool")[0];
    if(myDiv1 != null){
        console.log(myDiv1);
        document.getElementById("info").removeChild(myDiv1);
    }

    let ranking_pool = document.createElement("div");
    ranking_pool.setAttribute('class','ranking_pool');

    for (let index = 0; index < list.length; index++) {
        let ranking = document.createElement("div");
        ranking.setAttribute('class','ranking');


        let rank_avatar = document.createElement("div");
        rank_avatar.setAttribute('class','rank_avatar');
        
        if(index == 0){
            rank_avatar.classList.add("red_color");
        } else if(index == 1){
            rank_avatar.classList.add("orange_color");
        } else if(index == 2){
            rank_avatar.classList.add("yellow_color");
        }
        //rank
        rank_avatar.innerHTML = index + 1;
        //avatar
        let img = document.createElement("img");
        img.setAttribute('class','avatar_photo');
        img.setAttribute('src',list[index].avatar);
        img.setAttribute('alt','avatar photo');
        rank_avatar.appendChild(img);


        // user info
        let user_info = document.createElement("div");
        user_info.setAttribute('class','user_info');
        

        let name = document.createElement("p");
        name.setAttribute('class','name');
        name.innerHTML = list[index].name;

        let country = document.createElement("p");
        country.innerHTML = list[index].country;

        let balance = document.createElement("p");
        if(list[index].balance >= 0 )
            balance.setAttribute('class','green_color');
        else
            balance.setAttribute('class','red_color');
        balance.innerHTML = list[index].balance;

        user_info.appendChild(name);
        user_info.appendChild(country);
        user_info.appendChild(balance);





        ranking.appendChild(rank_avatar);
        ranking.appendChild(user_info);
        ranking_pool.appendChild(ranking);
        
        
    }

    document.getElementById("info").appendChild(ranking_pool);
    console.log(ranking_pool);



}