<?php
require_once "dbconnect.php";
if (isset($_POST["query"])) {
    $output = '';
    $query = "SELECT * FROM states WHERE name LIKE '%" . $_POST["query"] . "%'";
    $stmt = $pdo->query($query);
    $output = '<ul class="list-unstyled">';
    if ($stmt->fetchColumn() > 0) {
        while ($row = $stmt->fetch()) {
            $output .= '<li>' . $row["name"] . '</li>';
        }
    } else {
        $output .= '<li>Not Found</li>';
    }
    $output .= '</ul>';
    echo $output;
}