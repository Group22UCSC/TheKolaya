document.querySelector('.teapricetable').addEventListener('click', function(event) {
    var tableRow = event.target.parentNode;
   if(tableRow.className = "table-row") {
      var user_id = tableRow.getElementsByTagName('td')[0].innerHTML;
      var user_type = tableRow.getElementsByTagName('td')[2].innerHTML;
   }
   var userType = document.querySelector('#user-type select option');
   var userId = document.getElementById('user-id');
   userId.value = user_id;
   userType.innerHTML = user_type;
 });