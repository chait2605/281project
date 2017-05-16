<?php
//connect to database
$db = new mysqli("aadpk8b9wq1ns3.crugw38qv3oq.us-west-1.rds.amazonaws.com","CMPE281","cmpe28103","cloud281");

//check connection
if( $db->connect_error ){
    die( 'Connect Error:' .$db->connect_errno . ':' . $db->connect_error);
}

?>

<div>





    <table>

        <?php

        $sql = "SELECT * FROM test_cases";
        $result = mysqli_query($db, $sql) or die("Bad connection: $sql");



            while ($row = mysqli_fetch_array($result)) {


                echo "<td><a target ='_blank' href='uploads/{$row['tcfile']}' alt='{$row['tcname']}'><img src='images/filesmall.jpg'/><br>{$row['tcname']}</a></td>";

            }

        ?>

    </table>


</div>
