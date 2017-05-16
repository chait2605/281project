<?php

    if(isset($_POST['createissue'])) {

        $base64_usrpwd = base64_encode($_POST['user'] . ":" . $_POST['pass']);

        $ch = curl_init();
        $jiraurl = "https://crowstestmanager.atlassian.net/rest/api/2/issue/";
        curl_setopt($ch, CURLOPT_URL, $jiraurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic ' . $base64_usrpwd));


        $arr['project'] = array('key' => 'CT281');
        $arr['summary'] = $_POST['summary'];
        $arr['description'] = $_POST['description'];
        $arr['issuetype'] = array('name' => $_POST['type']);

        $json_arr['fields'] = $arr;

        $json_string = json_encode($json_arr, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        echo $json_string;

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_string);
        $result = curl_exec($ch);
        echo $result;
        curl_close($ch);


        $json_issue_arr = json_decode($result,true);
        $json_issue_id = "key";
        $json_issue_summary = "summary";
        $json_issue_type = "issuetype";



        $issue_id = $json_issue_arr[$json_issue_id];
        $issue_summary = $json_issue_arr[$json_issue_summary];
        $issue_type = $json_issue_arr[$json_issue_type];


        echo $issue_id;
        echo $issue_summary;
        echo $issue_type;

    }

?>



