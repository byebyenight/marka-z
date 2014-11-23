<?php
require_once("../Vendor/logger.php");
class LocalizationController extends AppController {
    function localization() {
        logg("dddddddddddddddddddddddddddddddddd", "a");
        if(isset($_POST)){
            logg("Something didn't work!", "a");
            $translation = array();
            $con=mysqli_connect("127.0.0.1","root","fx1989","collection");
           
            // Check connection
            if (mysqli_connect_errno()) {
                  logg( "Failed to connect to MySQL: " . mysqli_connect_error());
            }
            $query = "select * from tran";
            $result = mysqli_query($con, $query);
            logg(mysqli_num_rows($result), "a");
            while($row = mysqli_fetch_array($result)) {
                $translation[$row['key_string']] = $row['translation'];
            }
           logg(print_r($translation, true), "a");
           echo json_encode($translation);
        }
    }
}
?>

