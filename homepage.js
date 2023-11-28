const nav = document.getElementById('nav');
 const offset=50;

window.addEventListener("scroll", ()=>{
   if(window.scrollY > offset){
    nav.classList.add('nav-active');
   }else{
    nav.classList.remove('nav-active');
   }



});