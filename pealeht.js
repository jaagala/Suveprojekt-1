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

function date(clicked_id){
  var photoId = "photo" + clicked_id;
  document.addEventListener("keyup", function (event) {
    event.preventDefault();
    if (event.keyCode === 13) {S
      document.getElementById(photoId).submit();
    }
  });
}

function waitFunc(){
  modal.style.display = "none";
}