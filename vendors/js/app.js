let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let thekolayaLogo = document.querySelector(".thekolya-logo");
let socialMedia = document.querySelector(".sidebar .social_media_icon")


closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();
  if(thekolayaLogo.style.display !== "none")
    thekolayaLogo.style.display = "none";
  else
    thekolayaLogo.style.display = "inline-block";

  if(socialMedia.style.display !== "inline-block")
    socialMedia.style.display = "inline-block";
  else
    socialMedia.style.display = "none";
});

function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("fa-bars", "fa-times");
 }else {
   closeBtn.classList.replace("fa-times","fa-bars");
 }
}