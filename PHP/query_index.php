
<?php
include("query_connection.php");


//query for index.php
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else{
        }

      $sql = 'SELECT DISTINCT Vowel FROM aleph_bais';

      $result = mysqli_query($conn,$sql); 

      //also pass a row count to java script
      $rowcount=mysqli_num_rows($result);

      $row_quizes=mysqli_fetch_all($result);

      $rowcount_quizes=mysqli_num_rows($result);

      $sql = 'SELECT DISTINCT Sku FROM aleph_bais';

      $result = mysqli_query($conn,$sql); 

      //also pass a row count to java script
      $rowcount_questions=mysqli_num_rows($result);

      $row_questions=mysqli_fetch_all($result);


      $conn->close();
?>