<script>
  // $(document).ready(function() {
  var modal = document.querySelector(".modal");
  var closeButton = document.querySelector(".close-button");

  function toggleModal() {
    modal.classList.toggle("show-modal");
  }

  function windowOnClick(event) {
    if (event.target === modal) {
      toggleModal();
    }
  }

  var request_id = '';
  var confirmBtnValue = '';
  var sweetAlert = {
    message: '',
    title: ''
  };
  var requestDetails = {
    landownerId: '',
    name: '',
    amount: ''
  };
  $('#allRequest').click(function(event) {
    if ($(event.target.parentNode.childNodes[3]).hasClass('lid')) {
      // requestDetails.landownerId = event.target.parentNode.childNodes[3].innerHTML;
      requestDetails = {
        landownerId: event.target.parentNode.childNodes[3].innerHTML,
        name: event.target.parentNode.childNodes[5].innerHTML,
        amount: event.target.parentNode.childNodes[7].innerHTML
      };
      //Get the Previous requests
      $.ajax({
        type: "POST",
        url: "<?php echo URL ?>Supervisor/landownerDetails",
        cache: false,
        data: "landowner_id=" + requestDetails.landownerId,
        success: function(data) {
          $('#landowner_details').replaceWith(data);
        },
        // error: function(xhr, ajaxOptions, thrownError) {
        //   Swal.fire({
        //     icon: 'error',
        //     title: 'Oops...',
        //     text: 'Something went wrong! ' + xhr.status + ' ' + thrownError,
        //     // footer: '<a href="">Why do I have this issue?</a>'
        //   })
        // }
      })
      toggleModal();
      closeButton.addEventListener("click", toggleModal);
      window.addEventListener("click", windowOnClick);
      $('#landowner-id').val(requestDetails.landownerId);
    }
    request_id = event.target.parentNode.id;
  });
  $('#request_confirm_form').click(function(event) {
    // event.preventDefault();
    if ($(event.target).hasClass('confirmBtn')) {
      confirmBtnValue = $(event.target).val();
      // console.log(confirmBtnValue)
    }
    console.log(requestDetails);
    // console.log(confirmBtnValue);
    $(this).submit(function(event) {
      event.preventDefault();
      var form = $(this).serializeArray();

      form.push({
        name: 'request_id',
        value: request_id
      });
      if (confirmBtnValue == 'Accept') {
        form.push({
          name: 'response_status',
          value: 'accept'
        });
        sweetAlert.title = "Are you Sure To <b style=\"color:#4DD101;\">Accept?</b>";
        sweetAlert.message = "<div style=\"display:flex; justify-content:center;\">" +
          "<div style=\"text-align:left;\">" +
          "<div>Landowner ID: <span style=\"color:#4DD101;\"><b>" + requestDetails.landownerId + "</b></span></div>" +
          "<div>Name:  <span style=\"color:#4DD101;\"><b>" + requestDetails.name + "</b></span></div>" +
          "<div>Amount:  <span style=\"color:#4DD101;\"><b> " + requestDetails.amount + "kg</b></span></div>" +
          "</div>" +
          "</div>";
      } else if (confirmBtnValue == 'Decline') {
        form.push({
          name: 'response_status',
          value: 'decline'
        });
        sweetAlert.title = "Are you Sure To <b style=\"color:red;\">Decline?</b>";
        sweetAlert.message = "<div style=\"display:flex; justify-content:center;\">" +
          "<div style=\"text-align:left;\">" +
          "<div>Landowner ID: <span style=\"color:red;\"><b>" + requestDetails.landownerId + "</b></span></div>" +
          "<div>Name:  <span style=\"color:red;\"><b>" + requestDetails.name + "</b></span></div>" +
          "<div>Amount:  <span style=\"color:red;\"><b> " + requestDetails.amount + "kg</b></span></div>" +
          "</div>" +
          "</div>";
      }

      console.log(form);
      // form.push({name:'type', value: 'fertilizer'});
      // // console.log(form);
      // $('.error').remove();
      // var inAmount = $('#in_amount').val();
      // var pricePerUnit = $('#price_per_unit').val();
      // var priceForAmount = pricePerUnit*inAmount;
      // var str="<div style=\"display:flex; justify-content:center;\">"+ 
      //         "<div style=\"text-align:left;\">"+
      //             "<div>Price Per Unit: <span style=\"color:#4DD101;\"><b>Rs. " +pricePerUnit+ "</b></span></div>" +
      //             "<div>Amount :  <span style=\"color:#4DD101;\"><b> " +inAmount+ "kg</b></span></div>" +
      //             "<div>Price For Amount:  <span style=\"color:#4DD101;\"><b>Rs. " +priceForAmount+ "</b></span></div>" +
      //         "</div>" +
      //         "</div>";
      // if(inAmount == 0) {
      //     $('#in_amount').parent().after("<p class=\"error\">Please insert the amount</p>")
      // }else if(inAmount < 0) {
      //     $('#in_amount').parent().after("<p class=\"error\">Can't Insert minus values</p>");
      // } 
      // if(pricePerUnit < 0) {
      //     $('#price_per_unit').parent().after("<p class=\"error\">Can't Insert minus values</p>");
      // }else if(pricePerUnit == 0) {
      //     $('#price_per_unit').parent().after("<p class=\"error\">Please insert the price per unit</p>");
      // }

      // if(pricePerUnit <= 0 || inAmount <= 0) {
      //     return;
      // }
      Swal.fire({
        title: sweetAlert.title,
        html: '<div>' + sweetAlert.message + '</div>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4DD101',
        cancelButtonColor: '#FF2400',
        confirmButtonText: 'Yes, Update it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $("#request_confirm_form").trigger("reset");
          $.ajax({
            type: "POST",
            url: "<?php echo URL ?>Supervisor/manageRequests",
            cache: false,
            data: form,
            success: function(data) {
              Swal.fire(
                'Updated!',
                'Your file has been updated.',
                'success'
              ).then((result) => {
                location.reload();
              })
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
  });
  // })
</script>