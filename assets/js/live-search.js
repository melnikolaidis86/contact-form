$( document ).ready(function(event) {

    $('#search-query').keyup(function() {

        var txt = $(this).val();

        //Prevent form from submitting when hitting enter
        $('#search-form').keydown(function(event) {
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
        });

        if(txt.trim() == '') {
        $.ajax({
            method: 'post',
            url: 'http://localhost/custom-cms/application/search.php',
            dataType: 'HTML',
            success: function (data) {

                $('#search-result').html(data);
            }
        });
        } else {
        $.ajax({
            method: 'post',
            url: 'http://localhost/custom-cms/application/search.php',
            data: { search : txt },
            dataType: 'HTML',
            success: function (data) {

                $('#search-result').html(data);
            }
        });
        }
    });
});