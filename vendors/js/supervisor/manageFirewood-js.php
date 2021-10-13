<script>
    document.getElementById("instock_submit_btn").addEventListener("click", ajax_call_in_stock);
    function ajax_call_in_stock(e) {
        e.preventDefault();
        var pricePerUnit = document.getElementById('price_per_unit');
        var inAmount = document.getElementById('in_amount');
        console.log(inAmount + "\n" + pricePerUnit);
        Swal.fire({
        title: 'Are you sure?',
        text: "Price Per Unit: "+pricePerUnit.value+" "+"Amount: "+inAmount.value,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Updated!',
                'Your file has been updated.',
                'success'
                )
            const f = document.getElementById('form_instock');
            const form = new FormData(f);
            form.append("stock_type", "in_stock")
            form.append("type", "firewood");
            pricePerUnit.value = '';
            inAmount.value = '';
            const urlparams = new URLSearchParams(form);

            //1. Initialize XMLHttpRequest object
            const xhr = new XMLHttpRequest();

            //2. Establish connection
            xhr.open("POST", "<?php echo URL?>Supervisor/manageFirewood");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            //3. Callback function

            xhr.onload = function() {
                if(xhr.status == 200) {
                    const res = xhr.responseText;
                    console.log(res);
                }
            }
            //4. Send request
            xhr.send(urlparams);
            }
        })
        
    }

    document.getElementById("out-stock-submit").addEventListener("click", ajax_call_out_stock);
    function ajax_call_out_stock(e) {
        e.preventDefault();

        var outAmount = document.getElementById('out_amount');
        Swal.fire({
        title: 'Are you sure?',
        text: "Amount: "+outAmount.value,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Updated!',
                'Your file has been updated.',
                'success'
                )
            const f = document.getElementById('form_outstock');
            const form = new FormData(f);
            form.append("stock_type", "out_stock")
            form.append("type", "firewood");
            outAmount.value = '';
            const urlparams = new URLSearchParams(form);

            //1. Initialize XMLHttpRequest object
            const xhr = new XMLHttpRequest();

            //2. Establish connection
            xhr.open("POST", "<?php echo URL?>Supervisor/manageFirewood");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            //3. Callback function

            xhr.onload = function() {
                if(xhr.status == 200) {
                    const res = xhr.responseText;
                    // console.log(res);
                }
            }
            //4. Send request
            xhr.send(urlparams);
            }
        })
        
    }
</script>