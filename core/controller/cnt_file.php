<?php
/**
 * Calculates B/KB/MB for a given int
 * @param type $bytes
 * @param type $precision
 * @return type 
 */
function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

/**
 * File Upload function, stores a file, received via file extension in the specified directory
 */
function upload()
{
    if (isset($_FILES['file'])) {
        $sFileName = $_FILES['file']['name'];
        $sFileSize = bytesToSize1024($_FILES['file']['size'], 1);

        $target_path = configuration::$upload_dir ."/". $sFileName; 
        
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
        {
            echo "An error occured<br>";
            exit;
        }
                
        echo "$sFileName successfully received. Size: $sFileSize <br>";
    } else {
        echo 'An error occurred<br>';
    }
}



?>
