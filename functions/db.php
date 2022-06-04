<?php
$con = mysqli_connect('localhost', 'root', '', 'zrssb');

function escape($string){
    global $con;
    return mysqli_real_escape_string($con, $string);
}

function query($query) {
    global $con;
    return mysqli_query($con, $query);
}

function confirm($result) {
    global $con;
    if(!$result){
        die("QUERY FAILED" .mysqli_error($con));
    }
}

define( "DB_DSN", "mysql:host=localhost;dbname=zrssb" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_PostsS", 6 );

require( CLASS_PATH . "/Posts.php" );
