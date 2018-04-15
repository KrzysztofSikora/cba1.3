<?php

$db = mysqli_connect('krzysztofsikora24.pl', 'krzysztofcba', 'bazacba12', 'krzysztofsikora24_pl');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


foreach ($db->query("SELECT * FROM `pictures` WHERE imageID = 3") as $result) {


    $imgs = '<img src="data:image/jpeg;base64,' . base64_encode($result['img']) . '"
                    class="img-responsive center-block"/></a><br>';
    print $imgs;
}

?>
