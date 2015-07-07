<?php
/**
 * Created by PhpStorm.
 * User: paul
 * Date: 11.04.15
 * Time: 17:42
 */
require 'vendor/autoload.php';

$domain_obj = new \cloud2006\DomainGetter();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <link href="vendor/twitter/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="custom styles/custom.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Url checker</title>
</head>
<body>
<?php
    include_once 'gacode.php';
?>
<div class="container rs">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rs">
<h2>Url checker</h2>
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 rs">
    <form action="" method="get">
        <div class="form-group">
        <input type="text" class="form-control" name="domain" placeholder="Enter domain name here">
        <br/>
        <button type="submit" class="btn btn-warning">Show Urls</button>
        </div>
    </form>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rs">
<?php
if($domain_obj->domain != null) {
    $url_handler = new \cloud2006\Urlgrabber($domain_obj->domain);
    $url_handler->init();
    echo "<div><a class='btn btn-info' role='button' data-toggle='collapse' href='#collapseExt' aria-expanded='true' aria-controls='collapseExt'>External urls</a></div><table class='table table-striped collapse in' id='collapseExt'> <tbody>";
    $url_handler->disp();
    echo "</tbody></table>";
    echo "<a class='btn btn-success' role='button' data-toggle='collapse' href='#collapseInt' aria-expanded='false' aria-controls='collapseInt'>Internal urls</a> <table class='collapse table table-striped' id='collapseInt'> <tbody>";
    $url_handler->disp('int');
    echo "</tbody></table>";
}
?>
</div>
</div>
</div>
<script src="vendor/components/jquery/jquery.min.js"></script>
<script src="vendor/twitter/bootstrap/js/collapse.js"></script>
</body>
</html>