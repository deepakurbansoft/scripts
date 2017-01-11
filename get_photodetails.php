<?php
echo "IMG_0406.jpg:<br />\n";
$exif = exif_read_data('IMG_0406.jpg', 'IFD0');
echo $exif===false ? "No header data found.<br />\n" : "Image contains headers<br />\n";

$exif = exif_read_data('IMG_0406.jpg', 0, true);
echo "IMG_0406.jpg:<br />\n";
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
        echo "$key.$name: $val<br />\n";


    }
}
?>
