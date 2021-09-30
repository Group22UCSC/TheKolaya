
let showBtn = document.getElementById('left-btn');
let hidefield = document.getElementById('hide-inputfield')
showBtn.addEventListener('click', function() {
    if(hidefield.style.display == "block") {
        hidefield.style.display = "none";
    }else {
        hidefield.style.display = "block";
    }
    
})
