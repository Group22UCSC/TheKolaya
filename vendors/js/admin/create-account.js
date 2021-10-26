document.querySelector('.teapricetable').addEventListener('click', function(event) {
   var tableRow = event.target.parentNode;
   var td = tableRow.getElementsByTagName('td');
   var route = document.getElementById("route-number");
   var landOwnerType = document.getElementById("landowner-id");
   var userId = document.getElementById("user-id");
   var userType = document.querySelector("#user-type input");

   if(tableRow.className = "table-row") {
      var user_id = td[0].innerHTML;
      var user_type = td[1].innerHTML;
   }
   var userIdBegin = '';
      for (var i = 0; i < user_id.length; i++) {
          if (user_id[i] >= 'A' && user_id[i] <= 'z') userIdBegin += user_id[i];
      }
   var UserIdEnd = user_id.match(/\d+/);
   UserIdEnd = parseInt(UserIdEnd);
   UserIdEnd += 1;
   if(UserIdEnd < 10) {
      UserIdEnd = '00' + UserIdEnd;
   }else if(UserIdEnd <= 10 && UserIdEnd > 100) {
      UserIdEnd = '0' + UserIdEnd;
   }
   switch(user_type) {
      case "Land_Owner":
         route.style.display = "flex"
         landOwnerType.style.display = "flex"
         break;
      case "Agent":
         route.style.display = "flex"
         landOwnerType.style.display = "none"
         break;
      default:
         route.style.display = "none"
         landOwnerType.style.display = "none"
         break;
   }
   user_id = userIdBegin + "-" + UserIdEnd;
   console
   userId.value = user_id;
   userType.value = user_type;
 });
