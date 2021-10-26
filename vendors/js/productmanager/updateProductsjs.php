<script>
  
/// loading the pid for the first form
function loadPid(){
  //console.log("ada");
  var e = document.getElementById("productName");
  var val= e.options[e.selectedIndex].value;
  document.getElementById('pid').value=val;
}

/// getAll the details from the first form to the second
function loadModalName(element){

  var text = element.options[element.selectedIndex].text;
  document.getElementById('modalName').value=text;

}
</script>