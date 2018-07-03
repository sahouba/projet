
(function () {
  //  1: varaiables  globales + acces aux elements du DOM
   var title="Formation JS";
   var l=console.log;
   var nodeTitle=  document.getElementById("title");
   var nodeImg=  document.getElementById("image");
   var divStudents=document.getElementById('students');
   var divFiltres =document.getElementById('filtres');
   var divMessage=document.getElementById('message');
   var selectCoures =divFiltres.children[0]; // enfant d'indice 0
   var checkMajor =divFiltres.children[2]; // enfant d'indice 2
   var textSearch =divFiltres.children[3]; // enfant d'indice 3
   //  les elements de classe ciblée ne sont pas encore présents dans le Dom
   // mouvaise endroit
   // var students =document.getElementsByClassName('student');
   // l(students.lenght);
    var config ={
     appVeriosn:1,
     animation:false,
     afficheMessage:function (message) { console.log(message)},
     students:
  [
     {id:1,name:"Dominique",age:"14",attendedCourses:['PHP','javascript']},
     {id:2,name:"Anonio",age:"25",attendedCourses:['PHP']},
     {id:3,name:"Othman",status:"CDI",attendedCourses:[]},
     {id:4,name:"Tristan",age:"23",attendedCourses:['symfony','javascript']},
     {id:5,name:"nakkib",age:"30",attendedCourses:['PHP','javascript','angular','nodejs']}
   ],
     studentsFiltred:null,
     ageMajority :18
   };


 // 2:Fonctions
   function init() {
          nodeTitle.innerText=title;
          // on copie le tableau des etudiants non filtres
          //dans celui des etudiants filtres
          config.studentsFiltred = config.students;

           // divStudents.innerHTML =buildStudentsList();
           updateDom();
           divMessage.innerHTML = "";
        }

   function displayImg(){
           // let display=nodeImg.style.display;
            //        console.log(display);
            //        if ( display==="none") {
            // //display ="iniline :problem de modifier la copie de l'image pas l'original"
            //            nodeImg.style.display = "inline";
            //            console.log(display);
            //
            //      } else {
            //        nodeImg.style.display="none";
            //        console.log( "if" + display);
            //      }
            // version operatur teraire (syntaxe raccaurcie)
            if(config.animation ){
            let display=nodeImg.style.display;
            nodeImg.style.display=(display ==="none") ? "inline" :"none" ;
            }
           }


   function buildStudentsList() {
                   let s ="<ul>"; // variable contenant balisage html

                   //boucle sur le tableau des etudiants
                   for(let i=0; i<config.students.length; i++)
                   {
                     l("ok");

                     s +="<li>";
                     s += config.students[i].name;
                      if (config.students[i].age ){
                         s += " ( " +config.students[i].age + " ans )"
                      }

                   }

                  s +="</ul>";
                  return s; // retourne le balisage html

                 }

   function buildStudentsTable() {
              // variable contenant balisage html
           let header='<tr> <th> Nom </th> <th> Age </th>  <th> Cours suivis </th> </tr>';
           let s ='<table class ="table table-border table-striped ">';
           s+= header;


           //boucle sur le tableau des etudiants
           for(let i=0; i<config.studentsFiltred.length; i++)
           {
             l("ok");
             //colonne nom
             s +="<tr>";
             s +="<td>";
             s += '<a  id="'+config.studentsFiltred[i].id+'"class="student" href="#">'
             s += config.studentsFiltred[i].name;
             s += '</a>';
             s += "</td>";
               // 1 eme methode d'affiche les etudiants
            //  divMessage.innerText =  i+1 +"  étudiant(s) trouvé(s)";

             //colonne age
             s +="<td>";
             if(config.studentsFiltred[i].age) s += config.studentsFiltred[i].age;
             s +="</td>";
             //colonne cours suivis
             s +="<td>";
             s += config.studentsFiltred[i].attendedCourses+" ";
             s +="</td>";
             s +="</tr>";
           }

              s +="</table>";
              return s; // retourne le balisage html

            }

   function updateDom(){
      divStudents.innerHTML=buildStudentsTable();
       var students =document.getElementsByClassName('student');
       l(students.length);
        for (let i=0; i<students.length;i++){
          students[i].addEventListener('click', () => {
          //  l('super');
          let studentId=students[i].id;
          l(studentId);
          //requéte ajax pour obtenir info
          //supplementair sur l'étudiant identifé
          fetch('http://localhost:5000/student/'+studentId)
          .then((res)=>res.json())
          .then((res)=>console.log(res))
          })
        }
     }
   // function afficheOk() {
     //  console.log("ok");
     //
     // }

     //3:Evenemments
        // nodeTitle.addEventListener("click",function() {
        //   console.log("ok");
        // })

         nodeTitle.addEventListener("mouseover",displayImg);

         selectCoures.addEventListener("change",function(){
               let selectedCoure=this.value;

                 if(selectedCoure == "0"){
                   config.studentsFiltred = config.students;
                 }else{
                     //modifier la source de donnees par a l'option choisie
                       let studentsFiltred = config.students.filter(function(student){
                           return student.attendedCourses.indexOf(selectedCoure) != -1;
                   })
                 config.studentsFiltred = studentsFiltred;
                 }
                 // 2 eme methode d'affiche les etudiants
                divMessage.innerText=config.studentsFiltred.length+" étudiant(s) trouvé(s)"
                //mise a jour de DOM
                 updateDom();

                 //  l(studentsFiltred);
              });

         checkMajor.addEventListener("click",function(){
           //    l(this.checked);
                 if(this.checked){
                     let studentsFiltred =config.students.filter(student =>student.age > config.ageMajority);
                   //    l(studentsFiltred);
                   config.studentsFiltred =studentsFiltred;
                 } else {
                   config.studentsFiltred = config.students;
                 }
                 //mise a jour de DOM
                 updateDom();
                   })

         textSearch.addEventListener("keyup",function () {
                //l(this.value);
               if(this.value.length>2){
               //  l(this.value);
               let studentsFiltred=config.students.filter(
                 student => student.name.toLowerCase().indexOf(this.value.toLowerCase())!= -1);
                 config.studentsFiltred=studentsFiltred;
               } else {
                 config.studentsFiltred=config.students;
               }
               //mise a jour de DOM
                  updateDom();
             })




     // initialisation
     init();


})()
