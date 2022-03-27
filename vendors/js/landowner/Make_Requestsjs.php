<script>
  function changeFormBody() {
    var e = document.getElementById("RequestType");
    var val = e.options[e.selectedIndex].value;
    //document.getElementById('pid').value=val;
    if (val == "Advance") {
      var e = document.getElementById("Advance");
      e.style.display = "flex";
      var e = document.getElementById("Fertilizer");
      e.style.display = "none";
      console.log("A");
    } else if (val == "Fertilizer") {
      var e = document.getElementById("Fertilizer");
      e.style.display = "flex";
      var e = document.getElementById("Advance");
      e.style.display = "none";
      console.log("F");
    }
  }
</script>

<script>
  $(document).ready(function() {
    $('#requestBtn').click(function(event) {
      event.preventDefault();
      var form = $('#makeRequestForm').serializeArray();






      // $('.error').remove();
      // var amount = $('#amount').val();
      // var amount = document.getElementById("amount").val;
      // var qnty = $('#qnty').val();

      // console.log(amount);
      // //console.log(amount+pid+price+bid);
      // var action = 'save';

      // if (amount < 0) {
      //   $('#amount').parent().after("<p class=\"error\">*Please enter a valid value</p>");
      // } else if (amount == 0) {
      //   $('#amount').parent().after("<p class=\"error\">*Please enter a valid value 2</p>");
      // }
      // let isnum1 = /^\d*\.?\d*$/.test(amount); //amountvalidation -only numbers
      // if (!isnum1) {
      //   $('#amount').parent().after("<p class=\"error\">*Please enter a valid value 3</p>");

      // }

      // if (qnty < 0) {
      //   $('#qnty').parent().after("<p class=\"error\">*Quantity cannot be negative</p>");
      // } else if (qnty == 0) {
      //   $('#qnty').parent().after("<p class=\"error\">*Quantity cannot be zero</p>");
      // }
      // let isnum = /^\d*\.?\d*$/.test(qnty); //price validation -only numbers
      // if (!isnum) {
      //   $('#qnty').parent().after("<p class=\"error\">*Enter a valid Quantity</p>");

      // }
      // if (amount <= 0 || !isnum || qnty <= 0) {
      //   return;
      // }



      console.log(form);
      if (form[0]['value'] == 'Fertilizer') {
        var str = "<div style=\"display:flex; justify-content:center;\">" +
          "<div style=\"text-align:left;\">" +
          "<div>Request Type: <span style=\"color:#4DD101;\"><b> Fertilizer</b></span></div>" +
          "<div>Amount :  <span style=\"color:#4DD101;\"><b> " + form[1]['value'] + "kg</b></span></div>" +
          "</div>" +
          "</div>";
      } else if (form[0]['value'] == 'Advance') {
        var str = "<div style=\"display:flex; justify-content:center;\">" +
          "<div style=\"text-align:left;\">" +
          "<div>Request Type: <span style=\"color:#4DD101;\"><b> Advance</b></span></div>" +
          "<div>Amount :  <span style=\"color:#4DD101;\"><b> Rs." + form[2]['value'] + "</b></span></div>" +
          "</div>" +
          "</div>";
      }



      Swal.fire({
        title: 'Are you sure?',
        html: '<div>' + str + '</div>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4DD101',
        cancelButtonColor: '#FF2400',
        confirmButtonText: 'Yes, Update it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $("#makeRequestForm").trigger("reset");
          $.ajax({
            type: "POST",
            url: "<?php echo URL ?>Landowner/Make_Requests",
            cache: false,
            data: form,
            success: function(data) {
              Swal.fire(
                'Updated!',
                'Your file has been updated.',
                'success'
              )
              // console.log(data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong! ' + xhr.status + ' ' + thrownError,
                // footer: '<a href="">Why do I have this issue?</a>'
              })
            }
          })
        }
      })
    })
  })
</script>