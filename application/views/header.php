<html>
<head>
    <meta charset="UTF-8">
    <title>Sport complex</title>
    <link rel="stylesheet" href="http://bootswatch.com/cosmo/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom.css" >
    <script>
        $('a').click(function(){
            $('html, body').animate({
                scrollTop: $( $(this).attr('href') ).offset().top
            }, 500);
            return false;
        });
    </script>
</head>
