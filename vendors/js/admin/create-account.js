// var select = document.querySelectorAll('option');
// console.log(select[0].value);

var userType = document.querySelector('#user-type select option');
document.querySelector('.teapricetable').addEventListener('click', function(event) {
   var tableRow = event.target.parentNode;
   if(tableRow.className = "table-row") {
      var user_id = tableRow.getElementsByTagName('td')[0].innerHTML;
      // var user_type = tableRow.getElementsByTagName('td')[2].innerHTML;
   }
   var userType = document.querySelectorAll('option');
   // userType.forEach(function(item) {
   //    if(user_type === 'Land_Owner') {

   //    }
   //    console.log(item.value);
   // });
   var userId = document.getElementById('user-id');
   userId.value = user_id;
   // userType.innerHTML = user_type;
 });