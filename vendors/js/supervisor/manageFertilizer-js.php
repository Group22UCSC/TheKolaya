<script>
    $(document).ready(function(){
    $('#instock_submit_btn').click(function(event){
        event.preventDefault();
        var form = $('#form_instock').serializeArray();
        form.push({name:'stock_type', value: 'in_stock'});
        form.push({name:'type', value: 'fertilizer'});
        console.log(form);
        $('.error').remove();
        var inAmount = $('#in_amount').val();
        var pricePerUnit = $('#price_per_unit').val();

        if(inAmount < 0) {
            $('#in_amount').parent().after("<p class=\"error\">Can't Insert minus values</p>");
        }else if(inAmount == 0) {
            $('#in_amount').parent().after("<p class=\"error\">Please insert the amount</p>")
        }
        if(pricePerUnit < 0) {
            $('#price_per_unit').parent().after("<p class=\"error\">Can't Insert minus values</p>");
        }else if(pricePerUnit == 0) {
            $('#price_per_unit').parent().after("<p class=\"error\">Can't Insert minus values</p>");
        }

        if(pricePerUnit <= 0 || inAmount <= 0) {
            return;
        }
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
                    url: "<?php echo URL?>Supervisor/manageFertilizer",
                    cache: false,
                    data: form,
                    success: function(data) {
                        Swal.fire(
                        'Updated!',
                        'Your file has been updated.',
                        'success'
                        )
                        console.log(data);
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
    })
})
</script>