var vous;
var ordi;
document.getElementById('lecture').onclick = function() {
if(typeof localStorage!='undefined') {
var sauvegarde = JSON.parse(localStorage.getItem('coord'));
document.getElementById('scoreuser').innerHTML = sauvegarde.scoreU;
document.getElementById('scoreordi').innerHTML = sauvegarde.scoreO;
//document.getElementById('textvide').innerHTML ="dernier";
alert("Lecture effectuée");
} else alert("localStorage n'est pas supporté");


}
function Votrechoix(v){
vous=v;
document.votrechoix.src='img/choix'+v+'.jpg';
Choixordi();
}

function Choixordi(){
ordi=Math.round(Math.random()*2)+1;
document.choixordi.src='img/choix'+ordi+'.jpg';
UserGagne();
}
var scoreO= 0;
var scoreU= 0;
function UserGagne(){
if((vous==1) && (ordi==3) || (vous==2) && (ordi==1) || (vous==3) && (ordi==2))
{
  //alert('BRAVO!!!!');
document.getElementById('resultat').innerHTML="BRAVO !!!";
 //document.write(" Vous avez gagne !");
scoreU ++;

document.getElementById("scoreuser").innerHTML= scoreU;
document.getElementById("scoreordi").innerHTML= scoreO;

}
else{ OrdiGagne ();
}
}

function OrdiGagne(){
if((ordi==1) && (vous==3) || (ordi==2) && (vous==1) || (ordi==3) && (vous==2))
{
  //alert('PERDU!!!!');
document.getElementById('resultat').innerHTML="PERDU!!!!";
  scoreO ++ ;
    document.getElementById("scoreuser").innerHTML= scoreU;
    document.getElementById("scoreordi").innerHTML= scoreO;
}
else{
  //alert('AOUCH!\nA REFAIRE!');
 document.getElementById('resultat').innerHTML="Egalite!!!!";
 document.getElementById("scoreuser").innerHTML= scoreU;
 document.getElementById("scoreordi").innerHTML= scoreO;
}
// Méthode de stockage
        document.getElementById('stockage').onclick = function() {
         if(typeof localStorage!='undefined') {
         var sauvegarde = {
         scoreU:document.getElementById('scoreuser').innerHTML,
         scoreO:document.getElementById('scoreordi').innerHTML,
         };
         localStorage.setItem('coord',JSON.stringify(sauvegarde));
         alert("Mémorisation effectuée");
         } else alert("localStorage n'est pas supporté");
         } ;
         // Méthode de lecture

      }
      //clcok
      function clock(){
  var now = new Date();
  var ctx = document.getElementById('canvas').getContext('2d');
  ctx.save();
  ctx.clearRect(0,0,150,150);
  ctx.translate(75,75);
  ctx.scale(0.4,0.4);
  ctx.rotate(-Math.PI/2);
  ctx.strokeStyle = "black";
  ctx.fillStyle = "white";
  ctx.lineWidth = 8;
  ctx.lineCap = "round";

  // Marquage des heures
  ctx.save();
  for (var i=0;i<12;i++){
    ctx.beginPath();
    ctx.rotate(Math.PI/6);
    ctx.moveTo(100,0);
    ctx.lineTo(120,0);
    ctx.stroke();
  }
  ctx.restore();

  // Marquage des minutes
  ctx.save();
  ctx.lineWidth = 5;
  for (i=0;i<60;i++){
    if (i%5!=0) {
      ctx.beginPath();
      ctx.moveTo(117,0);
      ctx.lineTo(120,0);
      ctx.stroke();
    }
    ctx.rotate(Math.PI/30);
  }
  ctx.restore();

  var sec = now.getSeconds();
  var min = now.getMinutes();
  var hr  = now.getHours();
  hr = hr>=12 ? hr-12 : hr;

  ctx.fillStyle = "black";

  // Aiguille des heures
  ctx.save();
  ctx.rotate( hr*(Math.PI/6) + (Math.PI/360)*min + (Math.PI/21600)*sec )
  ctx.lineWidth = 14;
  ctx.beginPath();
  ctx.moveTo(-20,0);
  ctx.lineTo(80,0);
  ctx.stroke();
  ctx.restore();

  // Aiguille des minutes
  ctx.save();
  ctx.rotate( (Math.PI/30)*min + (Math.PI/1800)*sec )
  ctx.lineWidth = 10;
  ctx.beginPath();
  ctx.moveTo(-28,0);
  ctx.lineTo(112,0);
  ctx.stroke();
  ctx.restore();

  // Aiguille des secondes
  ctx.save();
  ctx.rotate(sec * Math.PI/30);
  ctx.strokeStyle = "#D40000";
  ctx.fillStyle = "#D40000";
  ctx.lineWidth = 6;
  ctx.beginPath();
  ctx.moveTo(-30,0);
  ctx.lineTo(83,0);
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0,0,10,0,Math.PI*2,true);
  ctx.fill();
  ctx.beginPath();
  ctx.arc(95,0,10,0,Math.PI*2,true);
  ctx.stroke();
  ctx.fillStyle = "rgba(0,0,0,0)";
  ctx.arc(0,0,3,0,Math.PI*2,true);
  ctx.fill();
  ctx.restore();

  ctx.beginPath();
  ctx.lineWidth = 14;
  ctx.strokeStyle = '#325FA2';
  ctx.arc(0,0,142,0,Math.PI*2,true);
  ctx.stroke();

  ctx.restore();

  window.requestAnimationFrame(clock);
}

window.requestAnimationFrame(clock);
