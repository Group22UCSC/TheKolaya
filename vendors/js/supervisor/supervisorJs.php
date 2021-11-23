<script>
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    var pusher = new Pusher('ef64da0120ca27fe19a3', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('today_collection_table', function(data) {
      $.ajax({
        url: "<?php echo URL ?>Supervisor/getAgentTeaCollection",
        success: function(result) {
          $('#not_display_collection_yet').hide();
          $('#today_collection_table').append(result);
        }
      });
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('today_request_table', function(data) {
      $.ajax({
        url: "<?php echo URL ?>Supervisor/getLandownerRequest",
        success: function(result) {
          $('#not_display_request_yet').hide();
          $('#today_request_table').append(result);
        }
      });
    });
  </script>