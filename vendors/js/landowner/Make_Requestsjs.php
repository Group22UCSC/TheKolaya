<script>

</script>

<script>
  var errorMessage = "";

  function changeFormBody() {
    var e = document.getElementById("RequestType");
    var val = e.options[e.selectedIndex].value;
    document.getElementById("quantity_error").innerHTML = "";
    document.getElementById("amount_error").innerHTML = "";
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
      // console.log("F");
    }
  }
  $(document).ready(function() {
    function showError(erroMessage, errorField) {
      $(errorField).html(erroMessage);
    }

    function removeError(errorField) {
      $(errorField).html("");
    }
    $('#requestBtn').click(function(event) {
      event.preventDefault();

      $("#qnty").keydown(function() {
        removeError("#quantity_error");
        removeError("#amount_error");
      })

      $("#amount").keydown(function() {
        removeError("#amount_error");
        removeError("#quantity_error");
      })

      var form = $('#makeRequestForm').serializeArray();
      var amount = form[1]['value'];
      // console.log(form);
      if (form[0]['value'] == 'Fertilizer') {
        // console.log('HI');
        // amount = form[1]['value'];
        var str = "<div style=\"display:flex; justify-content:center;\">" +
          "<div style=\"text-align:left;\">" +
          "<div>Request Type: <span style=\"color:#4DD101;\"><b> Fertilizer</b></span></div>" +
          "<div>Amount :  <span style=\"color:#4DD101;\"><b> " + form[1]['value'] + "kg</b></span></div>" +
          "</div>" +
          "</div>";
        if (amount == 0) {
          errorMessage = "*This must be filled !";
          showError(errorMessage, "#quantity_error")
          removeError("#amount_error");
        } else if (amount < 0) {
          errorMessage = "*Can't insert minus Value !";
          showError(errorMessage, "#quantity_error");
          removeError("#amount_error");
        } else {
          removeError("#quantity_error");
          removeError("#amount_error");
          errorMessage = "";
        }
      } else if (form[0]['value'] == 'Advance') {
        // console.log("BYE");
        amount = form[2]['value'];
        var str = "<div style=\"display:flex; justify-content:center;\">" +
          "<div style=\"text-align:left;\">" +
          "<div>Request Type: <span style=\"color:#4DD101;\"><b> Advance</b></span></div>" +
          "<div>Amount :  <span style=\"color:#4DD101;\"><b> Rs." + form[2]['value'] + "</b></span></div>" +
          "</div>" +
          "</div>";
        if (amount == 0) {
          errorMessage = "*This must be filled !";
          showError(errorMessage, "#amount_error");
          removeError("#quantity_error");
        } else if (amount < 0) {
          errorMessage = "*Can't insert minus Value !";
          showError(errorMessage, "#amount_error");
          removeError("#quantity_error");
        } else {
          removeError("#amount_error");
          // removeError("#quantity_error");
          errorMessage = "";
        }
      }
      if (errorMessage == "") {
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
      }

    })
  })
</script>