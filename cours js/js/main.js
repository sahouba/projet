/*var a=1 ;
var b=3 ;
var result=a+b;
console.log(typeof(result),result);
*/
var fruits=["banane","pomme","fraise","citron","orange"];
var display=function(arr){
   var str="<ul>";
     for (var i = 0; i< arr.length; i++) {
       str+="<li>" +arr[i]+ "</li>";
     }
     str+="</ul>";
     document.body.innerHTML=str;
     console.log(str);
   }
   display(fruits);
   var users ={

     "user1":{
       "firstname": "Glenn","surname":"Le Gac","age": "29","role":"Formateur"
   },
   "users2":{
     "firstname": "Jphn","Doe":"Le Gac","age": "99","role":"inconnu"
}
}
// alert(users.user1.firstnam);
var displayusers =function (arry) {


for(var key in arry){
  if(arry.hasOwnProperty(key)){
     var pFirstName=document.createElement('p');
     var pSurName=document.createElement('p');
     var pAge=document.createElement('p');
     var pRole=document.createElement('p');

     var firstnamTxt =document.createTextNode("prenom :"+ arry[key].firstname);
        var surNameTxt =document.createTextNode("nom :"+ arry[key].surname);
           var ageTxt =document.createTextNode("age  :"+ arry[key].age);
              var roleTxt =document.createTextNode("role :"+ arry[key].role);

              pFirstName.append(firstnamTxt);
              pSurName.append(surNameTxt);
              pAge.append(ageTxt);
              pRole.append(roleTxt);

              document.body.append(pFirstName);
              document.body.append(pSurName);
              document.body.append(pAge);
              document.body.append(pRole);
  }
}
};
displayusers(users);


/*for (var i = 0; i < users.length; i++) {

    alert(users.user1[i]);

}*/
console.log(users.user1,users.users2);
document.location.herf="https://www.google.de"
