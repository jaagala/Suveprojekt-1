/*jshint esversion: 6*/
window.onload=function(){
    openNav();
    closeNav();

};

  function openNav() {
  changeColorButton.addEventListener('click', changeBackgroundColor);
  }
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

function confirmDelete(){
  modal.style.display = "none";
  if(window.confirm('Kas tahate antud faili kustutada?')){
    return true;
  }
  window.location.replace("myfiles.php");
  return false;
}