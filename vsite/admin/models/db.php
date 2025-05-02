<?php
$conn = mysqli_connect("localhost","root","","fruits");
if($conn){
    mysqli_query($conn,"SET NAMES 'utf8'");
}
else{
    echo "Ket noi that bai";
}
class Db
{
    public static $connection;
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, PORT);
            self::$connection->set_charset(DB_CHARSET);
        }
        return self::$connection;
    }
}
