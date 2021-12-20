
<?php
class DBConnect{
  private static $conn;
   public function __construct(){

   }
   public static function getInstance()
   {
     if(!self::$conn){
       self::connect();
       return self::$conn;
     }else{
       return self::$conn;
     }
   }
   private static function connect(){
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "groupcart";
     // Create connection
     DBConnect::$conn = new mysqli($servername, $username, $password,$dbname);
     if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
     // Check connection
     if (DBConnect::$conn->connect_error) {
       die("Connection failed: " .DBConnect::$conn->connect_error);
     }
     // echo "Connected successfully.........................";
   }
   public function query($qry){
     return DBConnect::$conn->query($qry);
   }

   public function closeconnection(){
      self::$conn->close();
   }
}
