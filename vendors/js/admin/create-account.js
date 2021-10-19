var userType = document.querySelector('#user-type select option');
document.querySelector('.teapricetable').addEventListener('click', function(event) {
   var tableRow = event.target.parentNode;
   var td = tableRow.getElementsByTagName('td');
   if(tableRow.className = "table-row") {
      var user_id = td[0].innerHTML;
   }
   
   var userType = document.querySelectorAll('option');
   console.log(userType[0].innerHTML);
   var userId = document.getElementById('user-id');
   if(userType[0].innerHTML == 'Agent') {
      if(td[2].innerHTML === 'Agent' || td[2].innerHTML === 'Land_Owner') {
         userId.value = user_id;
      }
   }else {
      if(td[2].innerHTML !== 'Agent' || td[2].innerHTML !== 'Land_Owner') {
         userId.value = user_id;
      }
   }
   
   
 });