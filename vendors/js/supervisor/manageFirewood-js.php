<script>
    $(document).ready(function(){
    $('#instock_submit_btn').click(function(event){
        var form = $('#form_instock').serializeArray();
        form.push({name:'stock_type', value: 'in_stock'});
        form.push({name:'type', value: 'firewood'});

        var inStock = $('#in_amount').val();
        var pricePerUnit = $('#price_per_unit').val();
        Swal.fire({
        title: 'Are you sure?',
        text: "Price Per Unit: "+form[0]['value']+" "+"Amount: "+form[1]['value'],
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4DD101',
        cancelButtonColor: '#FF2400',
        confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $("#form_instock").trigger("reset");
                $.ajax({
                    type: "POST",
                    url: "<?php echo URL?>Supervisor/manageFirewood",
                    cache: false,
                    data: form,
                    success: function(data) {
                        Swal.fire(
                        'Updated!',
                        'Your file has been updated.',
                        'success'
                        )
                    },
                    error : function (xhr, ajaxOptions, thrownError) {
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
        event.preventDefault();
    })

    $('#out-stock-submit').click(function(event){
        var form = $('#form_outstock').serializeArray();
        form.push({name:'stock_type', value: 'out_stock'});
        form.push({name:'type', value: 'firewood'});

        Swal.fire({
        title: 'Are you sure?',
        text: "Amount: "+form[0]['value'],
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4DD101',
        cancelButtonColor: '#FF2400',
        confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo URL?>Supervisor/manageFirewood",
                    cache: false,
                    data: form,
                    success: function(data) {
                        Swal.fire(
                        'Updated!',
                        'Your file has been updated.',
                        'success'
                        )
                    },
                    error : function (xhr, ajaxOptions, thrownError) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            // footer: '<a href="">Why do I have this issue?</a>'
                        })
                    }
                })
            }
        })
        event.preventDefault();
    })
})
</script>