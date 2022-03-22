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








  // * get auction table - SELECT

  <?php $dateToday = date("Y-m-d"); ?>

  function getTable() {
    var url = "http://localhost/Thekolaya/landowner/getRequest";
    $.ajax({
      url: url,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        console.log(data);
        var len = data.length;
        var action = "";

        console.log()

        for (var i = 0; i < len; i++) {

          var deleteBtn = $("<button>Delete</button>");

          var str =
            "<tr class='row'>" +
            "<td>" +
            data[i].request_date.substring(0, data[i].request_date.indexOf(' ')) +
            "</td>" +
            "<td>" +
            data[i].request_type +
            "</td>" +
            "<td class='actionCol'>" +
            "<button type='button' id='editbutton' onclick='deleteRow()' >" +
            "Delete" +
            "</button>" +

            "</td>" +
            "</tr>";
          $("#teapricetable tbody").append(str);
        }

      }
    })
  }

  // function checkForm() {
  //   var url = "http://localhost/Thekolaya/landowner/getRequest";
  //   var todaysDate = new Date();
  //   var thisMonth = todaysDate.getMonth() + 1;
  //   var thisYear = todaysDate.getFullYear();
  //   document.getElementById("year").value = thisYear;
  //   document.getElementById("month").value = thisMonth;
  //   var isPriceSet = 0;
  //   $.ajax({
  //     url: url,
  //     type: "GET",
  //     dataType: "JSON",
  //     success: function(data) {
  //       //console.log(data);
  //       var len = data.length;

  //       for (var i = 0; i < len; i++) {
  //         var date = new Date(data[i].date);
  //         var month = date.getMonth() + 1;
  //         var year = date.getFullYear();
  //         if (month == thisMonth && year == thisYear) {
  //           isPriceSet = 1;
  //         }
  //       }
  //       if (isPriceSet == 1) {
  //         document.getElementById("setPriceBtn").disabled = true;
  //         document.getElementById("price").value = "Tea Price Already Set";
  //         document.getElementById("price").readOnly = true;
  //         document.getElementById("price").className = "input-set";
  //       }
  //       if (isPriceSet == 0) {
  //         document.getElementById("setPriceBtn").disabled = false;
  //         document.getElementById("price").readOnly = false;
  //         document.getElementById("price").className = "input";
  //       }

  //     }
  //   })

  // }

  function deleteRow() {
    // remove the row from ui
    $('#teapricetable tbody').on('click', '#editbutton', function() {
      // remobe the row from ui
      //$(this).closest('tr').remove();


      var $row = $(this).closest("tr"), // Finds the closest row <tr> 
        $date = $row.find("td:nth-child(1)"); // ist column value

      var date2 = $date.text(); // date as a javascript variable
      console.log(date2);

      //check date and delete
      var todaysDate = new Date();
      var thisMonth = todaysDate.getMonth() + 1;
      var thisYear = todaysDate.getFullYear();



      var str = "Delete tea price set on " + date2 + " ?";
      Swal.fire({
        title: 'Are You Sure ?',
        icon: 'warning',
        //   html:'<div>Line0<br />Line1<br /></div>',
        html: '<pre>' + str + '</pre>',
        //text: "Price Per Unit:  "+amount+"Amount: "+"<br>"+"Amount",
        confirmButtonColor: '#FF2400',
        cancelButtonColor: '#4DD101',
        confirmButtonText: 'Delete!',
        showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          $("#setTeaPriceForm").trigger("reset");

          $.ajax({
            type: "POST",
            url: "http://localhost/Thekolaya/landowner/deleteRequestRow",

            data: {
              date: date2,
            },
            success: function(data) {
              console.log(data);
              Swal.fire(
                'Deleted!',
                'Your Record Was Deleted Succesfully.',
                'success'
              )
              clearTable();
              getTable();
              checkForm();
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

  }



  function clearTable() {
    // $("#updateAuctionTable tr").remove();
    $('.row ').remove(); // removing the previus rows in the ui
  }


  function previousPrices() {

    var val = document.getElementById("pricetbl").style.display;
    if (val == "none") {
      var val = document.getElementById("pricetbl").style.display = "grid";

    } else {
      var val = document.getElementById("pricetbl").style.display = "none";
    }
  }

  function scrollFunc() {

    window.scrollTo(0, 500);
  }
</script>