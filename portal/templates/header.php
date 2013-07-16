<!DOCTYPE html>
<?php
//include_once('jcart/jcart.php');
//session_start();
require_once 'cfg/config.php';
require_once 'cfg/dbc.php';
require_once 'cfg/functions.php';
require_once 'cfg/scriptvars.php';
require_once 'cfg/uservars.php';
?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $page; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" media="screen, projection" href="jcart/css/jcart.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js" charset="utf-8"></script>

<script type="text/javascript" src="jcart/js/jcart.js"></script>
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

<script type="text/javascript" src="jcart/js/jquery-1.4.4.min.js"></script>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-fileupload.js"></script>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>

 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery.ui.all.css" type="text/css" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

    <script src="js/jquery-ui-timepicker-addon.js"></script>


<script>
tinymce.init({selector: "div.editme, textarea.editme", plugins: "link, image", menubar: false, toolbar: "undo redo | bold italic | link image"});
</script>



<script type="text/javascript"> $(function ()
{ $("#myModal").modal({show:false }); </script>

  <script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>

<script type="text/javascript"
    src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
    $(document).ready(
            function() {
                setInterval(function() {
                    var randomnumber = Math.floor(Math.random() * 100);
                    $('#cmnts').text(
                            '<?php include("pages/forum_replies.php"); ?>'
                                    );
                }, 3000);
            });
</script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-static-top">

<div class="navbar-inner">



                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
			<?php include('templates/menu.php'); ?>
                     <?php if (isset($_SESSION['name'])) {
$name = $_SESSION['name'];
include('templates/loginbox.php');
} else { include('templates/loginform.php'); }
                        
                        ?>
                        
                    </div><!--/.nav-collapse -->

</div>
<?php include('templates/loginmodal.php'); ?>
        <div class="container">
  <div class="row">
