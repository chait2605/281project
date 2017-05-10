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
                <td align="center">Project Name</td>
                <td align="center">Project Description</td>
                <td align="center">Release Name</td>
                <td align="center">Release Number</td>
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
$db = new mysqli("aadpk8b9wq1ns3.crugw38qv3oq.us-west-1.rds.amazonaws.com","CMPE281","cmpe28103","cmpe281");

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
if(isset($_POST['deleteproject'])){

    $projectname = $_POST['projectname'];
    $projectdesc = $_POST['projectdesc'];
    $releasename = $_POST['releasename'];
    $releasenumber = $_POST['releasenumber'];

    $sql = "DELETE FROM projects WHERE project_name='$projectname'";

    $query = mysqli_query($db,$sql) or die(mysqli_error($db));
}

$sqlselect = "SELECT * FROM projects";

$query = mysqli_query($db,$sqlselect) or die(mysqli_error($db));

print("<form method='post' action='datademo.php'><table width ='600' cellpadding='5' cellspace ='5'>
    <tr>
       <td> <strong> Project Name  </strong></td>
       <td> <strong> Project Desc </strong></td>
       <td> <strong> Release Name </strong></td>
       <td> <strong> Release Number </strong></td>
    </tr>");

while ($row = mysqli_fetch_array($query)){
    echo"
    <tr>
    	<td> ". $row['project_name']."</td>
    	<td> ". $row['project_desc']." </td>
    	<td>".  $row['release_name']."</td>
    	<td>".  $row['release_number']."</td>
    	<td><input type=\"submit\" name=\"updateproject\" class=\"textInput\" value=\"Update\">
    	<td><input type=\"submit\" name=\"deleteproject\" class=\"textInput\" value=\"Delete\">
    	</tr>
    ";

}

echo "</table>";
echo "</form>";


?>










