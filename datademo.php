<html>

<body>
<!--<p style = "font-size: 13pt" align="center">
    Enter your project details in the form below
    <br/>
<h1 align="center">project creation Form</h1>
<form method="post" action="datademo.php">
    <table align="center">
        <tr>
            <td>Project Name:</td>
            <td><input type="text" name="projectname" class="textInput"></td>
        </tr>
        <tr>
            <td>Project Description:</td>
            <td><input type="text" name="projectdesc" class="textInput" required></td>
        </tr>
        <tr>
            <td>Release Name:</td>
            <td><input type="text" name="releasename" class="textInput" required></td>
        </tr>
        <tr>
            <td>Release Number:</td>
            <td><input type="text" name="releasenumber" class="textInput" required></td>
        </tr>
        <br/>
        <br/>
        <tr>
            <td></td>
            <td><input type="submit" name="createproject" class="textInput" value="Create">
            <input type="submit" name="deleteproject" class="textInput" value="Delete">
            <input type="submit" name="updateproject" class="textInput" value="Update"></td>
        </tr>
        </div>

    </table>


</form>-->

<form method="post" action="datademo.php">
    <p style = "font-size: 13pt" align="center">
        Enter your project details in the form below
        <br/>
    <h1 align="center">project creation Form</h1>
    <form method="post" action="datademo.php">
        <table width ='600' cellpadding='5' cellspace ='5'>
            <tr>
                <th align="center">Project Name</th>
                <th align="center">Project Description</th>
                <th align="center">Release Name</th>
                <th align="center">Release Number</th>
            </tr>

            <tr>
                <td><input type="text" name="projectname" class="textInput"></td>
                <td><input type="text" name="projectdesc" class="textInput" required></td>
                <td><input type="text" name="releasename" class="textInput" required></td>
                <td><input type="text" name="releasenumber" class="textInput" required></td>
                <td><input type="submit" name="createproject" class="textInput" value="Create">
            </tr>




        </table>

</form>





</body>

</html>


<?php

//connect to database
$db = new mysqli("aadpk8b9wq1ns3.crugw38qv3oq.us-west-1.rds.amazonaws.com","CMPE281","cmpe28103","cloud281");

//check connection
if( $db->connect_error ){
    die( 'Connect Error:' .$db->connect_errno . ':' . $db->connect_error);
}


if(isset($_POST['createproject'])){

    $projectname = $_POST['projectname'];
    $projectdesc = $_POST['projectdesc'];
    $releasename = $_POST['releasename'];
    $releasenumber = $_POST['releasenumber'];

    $sql = "INSERT INTO projects (project_name,project_desc,release_name,release_number) VALUES ('$projectname','$projectdesc','$releasename','$releasenumber')";

    $query = mysqli_query($db,$sql) or die(mysqli_error($db));
}
if(isset($_POST['update'])){

    $id = $_POST['id'];
    $projectname = $_POST['projectname'];
    $projectdesc = $_POST['projectdesc'];
    $releasename = $_POST['releasename'];
    $releasenumber = $_POST['releasenumber'];

    $sql = "UPDATE projects SET project_name='$projectname',project_desc='$projectdesc',release_name='$releasename',release_number='$releasenumber' WHERE id = '$id'";

    $query = mysqli_query($db,$sql) or die(mysqli_error($db));
}

if(isset($_POST['delete'])){

    $id = $_POST['id'];
    $projectname = $_POST['projectname'];
    $projectdesc = $_POST['projectdesc'];
    $releasename = $_POST['releasename'];
    $releasenumber = $_POST['releasenumber'];

    $sql = "DELETE FROM projects WHERE id = '$id'";

    $query = mysqli_query($db,$sql) or die(mysqli_error($db));
}


$sqlselect = "SELECT * FROM projects";

$query = mysqli_query($db,$sqlselect) or die(mysqli_error($db));

?>

<table width ='600' cellpadding='5' cellspace ='5'>

    <?php
    while($row = mysqli_fetch_array($query)){

        echo "<tr><form action='datademo.php' method='post'>";
        echo "<input type='hidden' name='id' value='".$row['id']."'>";
        echo "<td><input type='text' name='projectname' value='".$row['project_name']."'></td>";
        echo "<td><input type='text' name='projectdesc' value='".$row['project_desc']."'></td>";
        echo "<td><input type='text' name='releasename' value='".$row['release_name']."'></td>";
        echo "<td><input type='text' name='releasenumber' value='".$row['release_number']."'></td>";
        echo "<td><input type='submit' name='update' value='Update'></td>";
        echo "<td><input type='submit' name='delete' value='Delete'></td>";
        echo "</form></tr>";

    }
    ?>
</table>























