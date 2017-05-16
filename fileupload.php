<?php
//connect to database
$db = new mysqli("aadpk8b9wq1ns3.crugw38qv3oq.us-west-1.rds.amazonaws.com","CMPE281","cmpe28103","cloud281");

//check connection
if( $db->connect_error ){
    die( 'Connect Error:' .$db->connect_errno . ':' . $db->connect_error);
}

?>


<html>


<div>
    File uploads
</div>

<!--Form to upload file-->

<form action="fileupload.php" method="post" enctype="multipart/form-data">
    <label>Test Case Title:</label> <input type="text" name="ttl"><br>
    <label>Test Case Description:</label> <input type="text" name="description"><br>
    <label>Category:</label>
    <select name="cat">
        <option value="nature">Nature</option>
        <option value="nature">People</option>
        <option value="nature">City</option>
    </select><br>
    <label>Image:</label><input type="file" name="img"><br>
    <input type="submit">
    <br>
    <tr><td>Test Cases For Test suite 1:</td></tr>
    <br>
    <tr><td><a href="displayTests.php" name="openfolder"><img src="images/folder.png"/></br></td>Test Suite 1</a></td></tr>

</form>

<?php
    if(isset($_FILES['img'])){
        //var_dump($_FILES['img']);

        $ttl = $_POST['ttl'];
        $desc = $_POST['description'];

        //echo $ttl;
        //echo $desc;

        $tempName = $_FILES['img']['tmp_name'];
        $out = "Temp Name: $tempName <br>";
        //echo $out;

        //Replace spaces in image name with underscores
        $cleanName = str_replace('','_', $_FILES['img']['name']);


        //Change Name
        $date = date_create();
        $ts = date_timestamp_get($date);
        $newFileName = $ts.$cleanName;
        $newFile = "New Name: ".$newFileName."<br>";
        //echo $newFile;

        //move uploaded file to where we want it to be
       move_uploaded_file($tempName, 'uploads/'.$newFileName);
       echo "Succesfully uploaded file to the server";

        $sql = "CREATE TABLE IF NOT EXISTS test_cases(
                id integer not null primary key auto_increment,
                tcname varchar(200),
                tcdescription varchar(400),
                tcfile varchar(500)
                )";

        $result = mysqli_query($db, $sql) or die("Bad connection: $sql");

        $insert = "INSERT INTO test_cases (tcname, tcdescription, tcfile) VALUES ('$ttl', '$desc', '$newFileName')";

        $insert_result = mysqli_query($db, $insert) or die("Bad connection: $insert");


        //echo "<tr><td><a href='uploads/'>New File</a></td>";
    }




?>





</html>