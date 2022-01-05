document.addEventListener("DOMContentLoaded",() => {
    const rows = document.querySelectorAll("tr[data-href-tea]");
    rows.forEach(row =>{
        row.addEventListener("click", ()=>{
         openteaform();
         //window.location.href=row.dataset.href;

        });
    });
});




function openteaform(){
  document.getElementById("teapopup").style.display = "block";
  // document.getElementById("overlay").style.display = "block";
  //console.log("before blur");
  // var blur = document.getElementById('blur');
  // blur.classList.toggle('active');
  //console.log("after blur");
}

function closeteaform(){
  document.getElementById("teapopup").style.display = "none";
  // document.getElementById("overlay").style.display = "none";
  //console.log("before blur back");
  // var blur = document.getElementById('blur');
  // blur.classList.toggle('closeblur');
  //console.log("after blur back");
}

