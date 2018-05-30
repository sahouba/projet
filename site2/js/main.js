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
