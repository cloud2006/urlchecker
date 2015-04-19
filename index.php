<?php
/**
 * Created by PhpStorm.
 * User: paul
 * Date: 11.04.15
 * Time: 17:42
 */
require 'vendor/autoload.php';


$domain_obj = new \cloud2006\DomainGetter();
$domain_name = $domain_obj->domain;
$url_handler = new \cloud2006\Urlgrabber($domain_name);

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <link href="vendor/twitter/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="container">
<div class="col-lg-12">
<div class="col-lg-3">
    <form action="" method="get">
        <div class="form-group">
        <input type="text" class="form-control" name="domain" placeholder="Enter domain name here">
        <button type="submit" class="btn btn-info">Show Urls</button>
        </div>
    </form>
</div>
<div class="col-lg-12">   
<table class="table table-striped">
<tbody>
<?php
    $url_handler->init();
    $links = $url_handler->url_array_builder();
    //echo '<hr>';
    //var_dump($url_handler->str_content);
    // echo '<pre>';
    // var_dump($links);
    // echo '</pre>';
    // echo '<hr>';
    
    foreach ($links as $value) {       
      echo '<tr><td>' . $value[0] . '</td></tr>'; 
    }

?>
</tbody>
</table>
</div>
</div>
</div>
</body>
</html>