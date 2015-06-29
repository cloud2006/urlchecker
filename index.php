<?php
/**
 * Created by PhpStorm.
 * User: paul
 * Date: 11.04.15
 * Time: 17:42
 */
require 'vendor/autoload.php';

$domain_obj = new \cloud2006\DomainGetter();
$url_handler = new \cloud2006\Urlgrabber($domain_obj->domain);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <link href="vendor/twitter/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="custom styles/custom.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Url checker</title>
</head>
<body>
<div class="container rs">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rs">
<h2>Url checker</h2>
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 rs">
    <form action="" method="get">
        <div class="form-group">
        <input type="text" class="form-control" name="domain" placeholder="Enter domain name here">
        <br/>
        <button type="submit" class="btn btn-info">Show Urls</button>
        </div>
    </form>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rs">   
<table class="table table-striped">
<tbody>
<?php
    $url_handler->init();
    $url_handler->disp();
?>
</tbody>
</table>
</div>
</div>
</div>
</body>
</html>