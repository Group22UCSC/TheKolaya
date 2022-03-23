<script>
  const openModalButtons = document.querySelectorAll('[data-modal-target]')
  const closeModalButtons = document.querySelectorAll('[data-close-button]')
  const overlay = document.getElementById('overlay')

  openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
      const modal = document.querySelector(button.dataset.modalTarget)
      openModal(modal);
      getPrice();
      reqType();
    })
  })

  overlay.addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal.active')
    modals.forEach(modal => {
      closeModal(modal)
    })
  })

  closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
      const modal = button.closest('.modal')
      closeModal(modal)
    })
  })

  function openModal(modal) {

    if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')

  }

  function closeModal(modal) {
    if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
  }

  function getPrice() {
    var price = document.getElementById('priceid').value;
    document.getElementById('priceInput').value = price;
  }

  function reqType() {
    var price = document.getElementById('RequestType').value;
    document.getElementById('rtype').value = price;
  }

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




    //  form submit - INSERT
    $(document).ready(function() {
      $("#confirmReq").click(function(event) {
        //alert("sad");
        console.log("Che");
        var str = "Request Type : \n" +
          "Quantity :  \n";
        Swal.fire({
          title: 'Confirm Update ',
          icon: 'warning',
          //   html:'<div>Line0<br />Line1<br /></div>',
          html: '<pre>' + str + '</pre>',
          //text: "Price Per Unit:  "+amount+"Amount: "+"<br>"+"Amount",
          confirmButtonColor: '#4DD101',
          cancelButtonColor: '#FF2400',
          confirmButtonText: 'Confirm!',
          showCancelButton: true
        }).then((result) => {
          if (result.isConfirmed) {
            $("#setTeaPriceForm").trigger("reset");

            $.ajax({

              success: function() {

                Swal.fire(
                  'Updated!',
                  'Your file has been updated.',
                  'success'
                )

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

      });
    });
  }
</script>