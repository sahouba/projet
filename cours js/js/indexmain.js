

var p =document.getElementsByTagName("p");
  for (var i = 0; i < p.length; i++) {
    if (!(i%2)){
      p[i].style.color ="red";
  }
    p[i].onmouseover =function(){
          this.style.backgroundColor="yellow";
    }
    p[i].onmouseout =function(){
        this.style.backgroundColor="white";
    }
}
