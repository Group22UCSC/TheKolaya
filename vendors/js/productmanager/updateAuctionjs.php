<script>
    function validation() {
        // var errArray=[];
        // errArray['name']="Melka";
        // let amount = document.getElementById('amount').value;
        // if (amount == "") {
        //   errArray['amountmissing']="Please fill the amount";
        // }
        // if(errArray.length==0){
        //   document.getElementById('amount').value=errArray['amountmissing'];
        // }
        // if(errArray.length==0){
        //   return true;
        // }
        return false;
    }

    /// loading the pid for the first form

    function loadPid() {
        // console.log("ada");
        var e = document.getElementById("productName");
        var val = e.options[e.selectedIndex].value;
        document.getElementById('pid').value = val;
    }

    function loadBid() {

        var e = document.getElementById("buyer");
        var val = e.options[e.selectedIndex].value;
        document.getElementById('bid').value = val;
        //console.log(document.getElementById('bid').value);
    }
    /// getAll the details from the first form to the second
    function loadModalName(element) {

        var text = element.options[element.selectedIndex].text;
        document.getElementById('modalName').value = text;

    }

    function loadModalName2() { // loading the buyers name to the pop up
        // console.log("ada");
        var element = document.getElementById('productName');
        var text = element.options[element.selectedIndex].text;
        document.getElementById('modalName').value = text;

    }

    function getDetails() {

        // var name=document.getElementById('productName');
        // document.getElementById('modalName').value=name.options[sel.selectedIndex].text;

        // var sel = document.getElementById("box1");
        // var text= sel.options[sel.selectedIndex].text;


        var pid = document.getElementById('pid').value;
        document.getElementById('modalPid').value = pid;


        var amount = document.getElementById('amount').value;
        document.getElementById('modalAmount').value = amount;

        var price = document.getElementById('price').value;
        document.getElementById('modalPrice').value = price;


        var buyer = document.getElementById('buyer');
        var buyerID = buyer.options[buyer.selectedIndex].text;
        document.getElementById('modalBuyer').value = buyerID;


        //update hidden feilds
        var buyer2 = document.getElementById('buyer').value;
        document.getElementById('modalBid').value = buyer2;
        //console.log(document.getElementById('modalBid').value);
    }
    // }

    // *******  JQuery *******
    var check = 0; // checking varible whether the amount is less than the available stock of the product
    //  form submit - INSERT
    $(document).ready(function() {
        $('#updateBtn').click(function(event) {
            // validateAmount();
            event.preventDefault();
            //validateAmount();
            validateAmount();
            
            console.log("update click");
            var form = $('#auctionForm').serializeArray();
            // form.push({name:'stock_type', value: 'in_stock'});
            // form.push({name:'type', value: 'firewood'});

            $('.error').remove();
            var productName = $('#productName option:selected').text();
            var buyer = $('#buyer option:selected').text();
            var amount = $('#amount').val();
            var pid = $('#pid').val();
            var price = $('#price').val();
            var bid = $('#buyer').val();

            //console.log(amount+pid+price+bid);
            var action = 'save';
            console.log("validateAMount:" + check);
            //////////////////////////////////

            //var pid = $('#pid').val();
            //var amount = $('#amount').val();
            // var url1="http://localhost/Thekolaya/productmanager/getProductStock";
            // var availableStock=0;
            // var check=0;
            // $.ajax({
            //     url:url1,
            //     type:"GET",
            //     dataType:"JSON",
            //     // pass the pid to the controller and get the available stock for that product pid
            //     data:{pid:pid},
            //     success:function(data){
            //         availableStock=data[0].stock;
            //         console.log("amoubt:"+amount);
            //         console.log("availableStock:"+availableStock);
            //         if(amount>availableStock){
            //             console.log("Too much");
            //             check=1;
            //             $('#amount').parent().after("<p class=\"error\">*Cannot Exceed the stock</p>")

            //         }else{

            //         }
            //         console.log(data[0].stock);
            //     }
            // })



            /////////




            if (amount < 0) {
                // $('#amount').parent().after("<p class=\"error\">Amount cannot be negative</p>");
                $('#amount').parent().after("<p class=\"error\">*Amount cannot be negative</p>");
            } else if (amount == 0) {
                $('#amount').parent().after("<p class=\"error\">*Please insert a valid amount</p>")
            }
            if (price < 0) {
                $('#price').parent().after("<p class=\"error\">*Price cannot be negative</p>");
            } else if (price == 0) {
                $('#price').parent().after("<p class=\"error\">*Price cannot be zero</p>");
            }

            if (amount <= 0 || price <= 0 || check == 0) {
                return;
            }
            var str = "Product Name:  " + productName + "\n" +
                "Amount :   " + amount + "\n" +
                "Price:  " + price + "\n" +
                "Buyer:  " + buyer + "\n" +
                "\n";
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
                    $("#auctionForm").trigger("reset");

                    $.ajax({
                        type: "POST",
                        url: "http://localhost/Thekolaya/productmanager/updateAuction",

                        data: {
                            action: action,
                            amount: amount,
                            pid: pid,
                            price: price,
                            bid: bid,
                        },
                        success: function(data) {

                            Swal.fire(
                                'Updated!',
                                'Your file has been updated.',
                                'success'
                            )
                            clearTable();
                            getTable();
                            checkoutofstock(pid);
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


    // * get auction table - SELECT
    <?php $dateToday = date("Y-m-d"); ?>

    function getTable() {
        var url = "http://localhost/Thekolaya/productmanager/getAuctionTable";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var len = data.length;
                //    $('#updateAuctionTable not(tbody)').empty();
                //$("#updateAuctionTable").trigger("reset");
                // $('updateAuctionTable').children( 'tr:not(:first)' ).remove();
                for (var i = 0; i < 10; i++) {
                    var date = data[i].date;
                    var str =
                        "<tr class='row'>" +
                        "<td>" +
                        data[i].date +
                        "</td>" +
                        "<td>" +
                        data[i].product_id +
                        "</td>" +
                        "<td>" +
                        data[i].product_name +
                        "</td>" +
                        "<td>" +
                        data[i].sold_amount +
                        "</td>" +
                        "<td>" +
                        data[i].sold_price +
                        "</td>" +
                        "<td>" +
                        data[i].name +
                        "</td>" +
                        "<td>" +
                        data[i].sold_amount * data[i].sold_price +
                        "</td>" +

                        "<td>" +
                        // (date==date)? "Hi":"Bye";
                        "</td>" +
                        "</tr>";
                    $("#updateAuctionTable tbody").append(str);
                    // there in the table DO NOT DEFINE <tbody> MANULLY
                    //IF SO IT WILL SHOW THE RESULTS TWICE
                }

            }
        })

    }
    // last row of auction table

    function clearTable() {
        // $("#updateAuctionTable tr").remove();
        $('.row ').remove(); // removing the previus rows in the ui
    }

    // check whether the entered amount of product is available in the stock
    // Not in use

    // function validateAmount(){
    //     var pid = $('#pid').val();
    //     var amount = $('#amount').val();
    //     var url="http://localhost/Thekolaya/productmanager/getProductStock";
    //     var availableStock=0;
    //     $.ajax({
    //         url:url,
    //         type:"GET",
    //         dataType:"JSON",
    //         // pass the pid to the controller and get the available stock for that product pid
    //         data:{pid:pid},
    //         success:function(data){
    //             availableStock=data[0].stock;
    //             console.log("amount A:"+amount);
    //             console.log("availableStock A:"+availableStock);
    //             if(amount>availableStock){
    //                 console.log("if");
    //                 $('#amount').parent().after("<p class=\"error\">*Cannot Exceed the stock</p>")
    //                 check=0;
    //             }else{
    //                 console.log("else");
    //                 check=1;
    //             }
    //             console.log(data[0].stock);
    //         }
    //     })
    //     console.log("END OF validateAmount");

    // }


    // function getData(ajaxurl) {
    //     var pid = $('#pid').val();
    //     var amount = $('#amount').val();

    //     var availableStock = 0;
    //     return $.ajax({
    //         url: ajaxurl,
    //         type: "GET",
    //         dataType: "JSON",
    //         // pass the pid to the controller and get the available stock for that product pid
    //         data: {
    //             pid: pid
    //         },
    //         // success: function(data) {
    //         //     availableStock=data[0].stock;
    //         //     console.log("amount A:"+amount);
    //         //     console.log("availableStock A:"+availableStock);
    //         //     if(amount>availableStock){
    //         //         console.log("if");
    //         //         $('#amount').parent().after("<p class=\"error\">*Cannot Exceed the stock</p>")
    //         //         check=0;
    //         //     }else{
    //         //         console.log("else");
    //         //         check=1;
    //         //     }
    //         //     console.log(data[0].stock);
    //         // }
    //     });
    // };
    // async function validateAmount() {
    //     var amount = $('#amount').val();
    //     var availableStock = 0;

    //         //var url="http://localhost/Thekolaya/productmanager/getProductStock";
    //         const data = await getData('http://localhost/Thekolaya/productmanager/getProductStock')
    //         console.log(data[0].stock);

    //         availableStock = parseInt(data[0].stock);
    //         console.log("amount A:" + amount);
    //         console.log("availableStock A:" + availableStock);
    //         if (amount > availableStock) {
    //             console.log("if");
    //             $('#amount').parent().after("<p class=\"error\">*Cannot Exceed the stock</p>")
    //             check = 0;
    //         } else {
    //             console.log("else");
    //             check = 1;
    //         }

    // }

    //checking out of stock
    function checkoutofstock(pid){
        var pid = pid
        var limit = 100
        var availableStock = 0;
        var url = "http://localhost/Thekolaya/productmanager/getProductStock";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            // pass the pid to the controller and get the available stock for that product pid
            data: {
                pid: pid
            },
            success: function(data) {
                availableStock = parseInt(data[0].stock); // from JSON object we get the
                // availableStock as a string. So we need to convert it an int
                console.log("Limit A:" + limit);
                console.log("availableStock A:" + availableStock);
                if (limit > availableStock) {
                    console.log("Limit 100 exceeded");
                    sendOutOfStockNoti(pid);
                    // $('#amount').parent().after("<p class=\"error\">*Cannot Exceed the stock</p>")
                    check = 0;
                } else {
                    console.log("available stock",availableStock);
                    check = 1;
                }
                console.log("FUNCTION" + data[0].stock);
            }
        })
    }

    function sendOutOfStockNoti(pid){
        var pid=pid;
        var url = "http://localhost/Thekolaya/productmanager/getProductStock";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            // pass the pid to the controller and get the available stock for that product pid
            data: {
                pid: pid
            },
            success: function(data) {
                availableStock = parseInt(data[0].stock); // from JSON object we get the
                // availableStock as a string. So we need to convert it an int
                console.log("amount A:" + amount);
                console.log("availableStock A:" + availableStock);
                if (amount > availableStock) {
                    console.log("if");
                    $('#amount').parent().after("<p class=\"error\">*Cannot Exceed the stock</p>")
                    check = 0;
                } else {
                    console.log("else");
                    check = 1;
                }
                console.log("FUNCTION" + data[0].stock);
            }
        })
    }

    function validateAmount() {
        var pid = $('#pid').val();
        var amount = $('#amount').val();
        var availableStock = 0;
        var url = "http://localhost/Thekolaya/productmanager/getProductStock";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            // pass the pid to the controller and get the available stock for that product pid
            data: {
                pid: pid
            },
            success: function(data) {
                availableStock = parseInt(data[0].stock); // from JSON object we get the
                // availableStock as a string. So we need to convert it an int
                console.log("amount A:" + amount);
                console.log("availableStock A:" + availableStock);
                if (amount > availableStock) {
                    console.log("if");
                    $('#amount').parent().after("<p class=\"error\">*Cannot Exceed the stock</p>")
                    check = 0;
                } else {
                    console.log("else");
                    check = 1;
                }
                console.log("FUNCTION" + data[0].stock);
            }
        })
    }
</script>