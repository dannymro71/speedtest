<?php

    include_once("search_db.php");

    $name = $_POST['name'];
    $sql = "SELECT * FROM speedtest_users WHERE extra LIKE '$name%'";
    $query = mysqli_query($conn,$sql);
    $data = '';
    while($row = mysqli_fetch_assoc($query)) {
        $data .= "<tr><td>" . $row['id'] . "</td>";
        $data .= "<td>" . $row['extra'] . "</td>";
        $data .= "<td>" . $row['log'] . "</td>";
        $data .= "<td>" . $row['ip'] . "</td>";
        $data .= "<td>" . $row['ping'] . "</td>";
        $data .= "<td>" . $row['jitter'] . "</td>";
        $data .= "<td>" . $row['dl'] . "</td>";
        $data .= "<td>" . $row['ul'] . "</td>";
        $data .= "<td>" . $row['timestamp'] . "</td></tr>";
    }
    echo $data;
?>