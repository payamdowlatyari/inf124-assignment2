<?php
require_once "dbconnect.php";

if (isset($_POST["query"])) {

    $sql = "SELECT * FROM states WHERE name LIKE '%" . $_POST["query"] . "%'";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $stmt->bindColumn('name', $name);

        while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {

            $data = "<li>" . $name . "</li>\n";

            if (!$stmt->rowCount()) {

                print "Not Found";
            } else {

                print $data;
            }
        }
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}