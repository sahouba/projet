//positionement de falg
 toogle =false ;
 // selection de elmeent par sont id
 var btn =document.getElementById("toogle");
 // declanchement deune fonclion su l'evenement"click"
 btn.onclick = function() {
   toogleThis();
 }
 //function

 var toogleThis = function() {

   toogle=!toogle;

var square1 = document.getElementsByClassName('square1')[0];
var square2 = document.getElementsByClassName('square2')[0];

 if (toogle){
    square1.style.backgroundColor="green";
      square2.style.backgroundColor="red";
 } else {
   square1.style.backgroundColor="red";
     square2.style.backgroundColor="green";
 }
return;
}
