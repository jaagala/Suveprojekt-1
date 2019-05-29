/*jshint esversion: 6*/
window.onload=function(){
  openNav();
  closeNav();

};

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  changeColorButton.addEventListener('click', changeBackgroundColor);

}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
