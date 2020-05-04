<?php
$connect = mysqli_connect("localhost", "root", "", "ssdb");
if (isset($_POST["query"])) {
    $output = '';
    $query = "SELECT * FROM tax WHERE ZipCode LIKE '%" . $_POST["query"] . "%'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_array($result)) {
            $output .=  $row["CombinedRate"];
        }
    } else {
        $output .= '0.000000';
    }
    echo $output;
}