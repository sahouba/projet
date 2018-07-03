(function () {
  // I declaration des variable globales
        //Asynchronie:patage les taches 
              var config={
                anim :null
              };
              const divMessage=document.getElementById('message');
              const divTeams=document.getElementById('teams');
              const btnStart=document.getElementById('btnStart');
              const btnStop=document.getElementById('btnStop');
              const imgColisee=document.getElementById('imgColisee');
              const btnAjax=document.getElementById('btnAjax');
                //Asynchronie    console.log("premiére instruction");
                //  setTimeout(function(){console.log("premiére instruction");  },8000)
                //  setInterval(function(){console.log("callback");},5000)
                //synchronie
                //  console.log("deuxiéme instruction");

    // II Fonctions
    function init() {
        }

    function staranim(){
      let w =imgColisee.width;
      let left = imgColisee.style.left;
      let opa =1;
      console.log(1-0.10);
      console.log(left);
          //  console.log( typeof imgColisee.width);
        config.anim =setInterval(function(){
        //     divMessage.innerHTML += '<p> balblba </p>';
          w += 10;
           if(opa>0.5)opa-=0.025;
              imgColisee.style.left= w +"px";
              imgColisee.style.width= w +"px";
              imgColisee.style.opacity =opa ;
         }, 100)

      }

    function stopanim() {
      clearInterval(config.anim);
      }

  // III Evenements
        btnStart.addEventListener("click",staranim);
        btnStop.addEventListener("click",stopanim);
        btnAjax.addEventListener("click",() => {
              // if (fetch) {
              //   console.log("fetch dispo");
              //
              // }
                divTeams.innerHTML=" "; //clear
                divTeams.classList.remove('alert-danger');
            fetch("http://localhost:5000/teams")
            .then(res => res.json())
          //  .then(console.log(res))
            .then(teams =>{
                // ici les données sont reçues et parsées en tabeau JS
                // la chaine de caractéres JSON correspondant  ala réponse
                // serveur a été convertie en tableau JS
                teams.forEach(team=>{
                  let s='<p> <img class="logo" src="'+ team.logo +'" alt="">';
                  s += '<spam>'+ team.name+'</spam>';
                  divTeams.innerHTML+=s;
                }
                //  team =>divMessage.innerHTML += "<p>"+ team.name +"</p>"
                )
            })
            .catch((err)=>{
              divTeams.innerHTML+="Erreur : Impossible de charger les équipe";
              divTeams.classList.add('alert-danger');
            })

            })



   init();
})()
