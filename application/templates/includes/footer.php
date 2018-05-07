    <!-- Include jQuery (required) and the JS -->
    <script src="<?php echo BASE_URI ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URI ?>assets/js/tether.min.js"></script>
    <script src="<?php echo BASE_URI ?>assets/js/toolkit.js"></script>
    <script src="<?php echo BASE_URI ?>assets/js/application.js"></script>

    <script>

      //Prevent form from submitting when hitting enter
      $('#search-form').keydown(function(event) {
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });

      $('#search-query').keyup(function() {

        var txt = $(this).val();

        if(txt.trim() != '') {
          $.ajax({
            method: 'post',
            url: 'http://localhost/custom-cms/application/search.php',
            data: { search : txt },
            dataType: 'JSON',
            success: function (data) {
              console.log(data);
              console.log($('#search-title'));
              $('#search-title').html(data[0].post_title);
            }
           });
        } 

      });

    </script>

  </body>
</html>