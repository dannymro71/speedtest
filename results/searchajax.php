<?php

    include_once("search_db.php");

    $name = $_POST['name'];
    $sql = "SELECT * FROM speedtest_users WHERE extra LIKE '$name%' order by timestamp DESC";
    $query = mysqli_query($conn,$sql);
    $data = '';
    while($row = mysqli_fetch_assoc($query)) {
        $data .= "<tr><td><a href='./?id=" . $row['id'] . "' target='_black'>" . $row['id'] . "</td>";
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