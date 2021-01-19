<?php
 $db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'queen' ) or die(mysqli_error($db));
 mysqli_set_charset($db,"utf8");
?>