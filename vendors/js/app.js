let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");
let thekolayaLogo = document.querySelector(".thekolya-logo");


closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
  if(thekolayaLogo.style.display !== "none")
    thekolayaLogo.style.display = "none";
  else
    thekolayaLogo.style.display = "inline-block";
});

searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
  sidebar.classList.toggle("open");
  menuBtnChange(); //calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("fa-bars", "fa-times");//replacing the iocns class
 }else {
   closeBtn.classList.replace("fa-times","fa-bars");//replacing the iocns class
 }
}

