(function(){
      // declaration des varaible globales
       const l=console.log;
       const divMessage=document.getElementById('message');
       const divFiltres =document.getElementById('filtres');
       const selectCountry =divFiltres.children[0];
       var textSearch =divFiltres.children[2];
    //   console.log(selectEquipes);

        var teamsObject = {};
      // Fonctions
    function init(){
        //  buildEquipesTable();
        fetch('http://localhost:5000/teams')
         .then(res => res.json())
         .then(teams => {

           teamsObject.teams = teams;
           teamsObject.teamsToDisplays = teamsObject.teams;
           buildTeamsTable();
           buildSelectCountry();

         })
        //  buildEquipesTable();
      }
    function buildTeamsTable(){

        l(selectCountry);

        let header='<tr> <th> logo </th> <th> name </th>  <th> country </th>  <th> stadium </th> <th> coach </th> <th> founded </th> <th> nbCup </th></tr>';
        let s ='<table class ="table table-border table-striped ">';
        s+= header;
                teamsObject.teamsToDisplays.forEach(team=>{
                //  console.log(team.name);
                    //let teamFiltred =teamsObject.filter(team.country=selectEquipes);

                    //l("ok");
                    //colonne logo
                  s +="<tr>";
                  s +="<td>";
                  s += '<img class="logo" src="'+ team.logo +'" alt="">';
                  s += "</td>";
                  //colonne name
                  s +="<td>";
                  s += team.name;
                  s += "</td>"
                    //colonne country
                  s +="<td>";
                  s += team.country;
                  s += "</td>"
                    //colonne stadium
                  s +="<td>";
                  s += team.stadium;
                  s += "</td>"
                    //colonne coach
                  s +="<td>";
                  s += team.coach;
                  s += "</td>"
                    //colonne founded
                  s +="<td>";
                  s += team.founded;
                  s += "</td>"
                    //colonne nbCup
                  s +="<td>";
                // s += team.nbCup;
                  for(let i=0; i<team.nbCup; i++){
                      s += '<img class="logo" src="../img/champions.png" alt="">';
                  }

                  s += "</td>"
                  s +="</tr>";

                })
                s +="</table>";
                divMessage.innerHTML = s;



      }

    function buildSelectCountry(){

      let All = new Option("Tous Les équipes", "All");
      selectCountry.options.add(All);

      let Selected = []
      teamsObject.teams.forEach(team => {
        if(!Selected[team.country.toLowerCase()]){
          let opt = new Option(team.country, team.country);
          selectCountry.options.add(opt);
          Selected[team.country.toLowerCase()] = 1;
        }
      })


  }

      // Evenements
      selectCountry.addEventListener('change',function(){
        let selectCountry=this.value;

            if (selectCountry == 'All') {
              teamsObject.teamsToDisplays = teamsObject.teams;

            } else {
              let countriesFiltered = teamsObject.teams.filter(function(team){
                return team.country.indexOf(selectCountry) != -1;
              })
              teamsObject.teamsToDisplays = countriesFiltered;

            }

               buildTeamsTable();
      });
      textSearch.addEventListener("keyup",function () {
          if (this.value.length > 1) {
           let countryFiltered = teamsObject.teams.filter(team => team.name.toLowerCase().indexOf(this.value.toLowerCase()) != -1 || team.coach.toLowerCase().indexOf(this.value.toLowerCase()) != -1 || team.stadium.toLowerCase().indexOf(this.value.toLowerCase()) != -1);
           teamsObject.teamsToDisplays = countryFiltered;
            } else {
           teamsObject.teamsToDisplays = teamsObject.teams;
           }
           buildTeamsTable();

          })

  init();


})()
