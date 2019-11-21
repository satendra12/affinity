<?php
$path = "D:\Books\WebService";
$dh = dir($path);
while (($file = $dh->read()) !== false) {
    if ($file == "." || $file == "..") continue;
    // have a new variable for the real filepath
    $realfile = $path . "/" . $file;
    echo "<tr><td><a href='download.php?f=$file' title='Click to Open/Download'>$file</a></td>";
    echo "<td>";
    echo (is_file($realfile)) ? "<img src='file.jpg'/> FILE" : "<img src='folder.jpg'/> FOLDER ";
    echo "</td><td>" . filesize($realfile) . "</td>";
    echo "<td><input type='checkbox' name='delete[]'/></td></tr>";
}
?>