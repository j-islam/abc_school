<!DOCTYPE html>
<html>
<head>
    <title>Terms & Services - ABC School</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src='bootstrap/js/bootstrap-datepicker.js'></script>
    <script type="text/javascript" src="loginvalidation.js"></script>
    <script src="bootbox.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
    
</head>

<body>
<div class="pagetitle">
    <span>
        <center>
        <a href="../index.php">
            <img class="img-responsive" src="../files/abc_logo.png" alt="ABC School Logo" width="100" height="75">
            <h1><strong>ABC SCHOOL</strong></h1>
            <h4>School Management Application</h4>
        </a>
        </center>
    </span>
</div>

<div class="container">
<div class="col-sm-12 col-md-12">
    <article>

    <h2>Instructions</h2>
    <p>Every applicants should fill up all the required fields of this application.
    After submitting this application, everyone have to pay 500 BDT through Bkash.</p>

    <h2>For Payment</h2>
    <ol>
        <li>To pay application fees pick your mobile phone.</li>
        <li>Dial *247#, Then select option ‘3’ for payment.</li>
        <li>Pay at 017XXXXXXXX.</li>
        <li>Enter your Bkash transaction no in the next page of this online application.</li>
        <li>Finally, submit your application!</li>
    </ol>

    <h2>Requirements</h2>
    <p>An applicant must upload their previous certificates with this application.</p>
    <br>
    <center><a href="../index.php" type="button" role="button" class="button btn-primary">Return to Home</a></center>
    <br><br>

    </article>
</div>

</div>
<?php $year = date('Y');  ?>
<div class="pagefooter">
    <center>
    <p></p>
    <small><a href="public/terms.php">Terms & Services</a> - <a>About</a> - <a>Cookies</a> - <a>Privacy Policy</a><br><span class="glyphicon glyphicon-copyright-mark"></span> Copyright 1999-<?php echo $year; ?>. All Rights Reserved.<br>Developed by Prosenjit Chowdhury</small>
    </center>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("input, select").focus(function(){
            $(this).css("background-color","#acecca");
        });
        $("input, select").blur(function(){
            $(this).css("background-color","#ffffff")
        });

        $(".container, .imgslider").css("box-shadow","0 4px 8px 0 rgba(0, 0, 0, 0.35), 0 6px 20px 0 rgba(0, 0, 0, 0.31)");

        $("button, input, select, nav").mouseenter(function(){
            $(this).css("box-shadow","0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)");
        });
        $("button, input, select").mouseleave(function(){
            $(this).css("box-shadow","2px 2px 2px #229156");
        });
    });
</script>
</body>
</html>