<?php
echo "inside ";
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
echo "inside if";
    //file properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // work out file extension
   $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed = array('txt', 'jpg', 'pdf');

    if (in_array($file_ext, $allowed)) {
        echo "array" ;
        if ($file_error === 0) {
            echo "error";
            if ($file_size <= 2097152) {
                echo "SIZE";
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = '/Users/niveditanadkarni/desktop' . $file_name_new;
                echo $file_destination;
                echo "\n";
                echo $file_name_new;
            }
        }

    }

}
?>