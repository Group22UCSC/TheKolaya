<script>
  // $(document).ready(function() {
  var modal = document.querySelector(".modal");
  var closeButton = document.querySelector(".close-button");
  // var isNotificationsSlided = false;

  function toggleModal() {
    modal.classList.toggle("show-modal");
    if ($('.notiBox').is(':visible')) {
      $('.notiBox').slideUp();
      isNotificationsSlided = true;
    }else {
      if(typeof isNotificationsSlided === 'undefined') {

      }else if(isNotificationsSlided == true) {
        // console.log('bye' + isNotificationsSlided);
        $('.notiBox').slideDown();
        isNotificationsSlided == false;
      }
    }
    // console.log(isNotificationsSlided);
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
    // console.log(event.target.parentNode.childNodes)
    if ($(event.target.parentNode.childNodes[5]).hasClass('lid')) {
      // requestDetails.landownerId = event.target.parentNode.childNodes[3].innerHTML;
      requestDetails = {
        landownerId: event.target.parentNode.childNodes[5].innerHTML,
        name: event.target.parentNode.childNodes[9].innerHTML,
        amount: event.target.parentNode.childNodes[13].innerHTML
      };
      // console.log(requestDetails)
      //Get the Previous requests
      $.ajax({
        type: "POST",
        url: "<?php echo URL ?>Supervisor/landownerDetails",
        cache: false,
        data: "landowner_id=" + requestDetails.landownerId,
        success: function(responseText) {
          // console.log(responseText);
          var parser = new DOMParser();
          var xmlDoc = parser.parseFromString(responseText, "text/html");
          var myHtml = xmlDoc.getElementById("previous_details").innerHTML;
          // var myHtml = $(responseText).find('#previous_details').html();
          $('#lanowner_details_table').html(myHtml);
          // console.log(myHtml);
          myHtml = xmlDoc.getElementById("get_tea_rate").innerHTML;
          $('#tea-rate').html(myHtml);
          // console.log(myHtml);
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
    // console.log(requestDetails);
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

      // console.log(form);

      Swal.fire({
        title: sweetAlert.title,
        html: '<div>' + sweetAlert.message + '</div>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#01830c',
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
              Swal.fire({
                icon: 'success',
                title: 'Updated !',
                text: 'Your file has been updated.',
                confirmButtonColor: '#01830c'
              }).then((result) => {
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