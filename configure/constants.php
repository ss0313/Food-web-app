  <?php 
    //Create Constants to Store Non Repeating Values. Constants are stored by putting CAPS letters.
    define('SITEURL','http://localhost/food-order/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, 'food-order') //Selecting Database. die will terminate process.


?>
