<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.js">
    </script>
    <link rel="stylesheet" type="text/css">

</head>

<body>
<div id="wrapper">
    <h1>Create Issue</h1>
    <form id="issue-form" method="post" action="jiraapi.php">
        Summary: <input type="text" name="summary" id="summary" value=""/><br> <br>
        Description: <input type="text" name="description" id="description" value=""/><br><br>
        Issue Type: <input type="text" name="type" id="type" value=""/><br><br>
        Username: <input type="text" name="user" id="user" value=""/><br><br>
        Password: <input type="password" name="pass" id="pass" value=""/><br><br>
        <input type="submit" name="createissue" id="button" value="Create Issue"/>

    </form>
</div>

<!--<script>
    $('#button').click(function(){
        $.ajax({
            type: "POST",
            url: "jiraapi.php",
            data: $('#issue-form').serialize(),
            success: function(data) {

                alert(data);
                
            },
            dataType: "html"
        });
    });
</script>-->
</body>
</html>