<script>
    document.querySelector('.request-table').addEventListener('click', function(event) {
        
        if(event.target.classList.contains("user-id")) {
            console.log(event.target);
            var getId = event.target.innerHTML;
            document.getElementById('landowner-id').value = getId;
        }
            
    });
</script>