(function(){

console.log('app.js chargé');
// if (Zepto){
//   console.log('Zepto dispo');
//   console.log($);
// } else {
//   console.log('Zepto pas dispo');
// }

 // $('table').hide();

 // varaiable
 const cbInjured =$('#cbInjured');
 const rows =$('td.injured').parent();

 cbInjured.on('click',()=> rows.toggle());
    // console.log('click');
    //$('.injured').hide(); cache just le mote blessés

     // cache tous la ligne de td
})()
