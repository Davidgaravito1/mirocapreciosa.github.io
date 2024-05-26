<?php
$dir = "uploads/vestidos/";
if (is_dir($dir)){
    if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
            if ($file != "." && $file != "..") {
                echo "<img src='$dir$file' class='img-fluid' alt='Vestido'> ";
            }
        }
        closedir($dh);
    }
}
?>