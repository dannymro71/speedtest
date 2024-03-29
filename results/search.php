<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speedtest Live Search</title>
    <link href="../src/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .aliniere {text-align: center; vertical-align: middle}
    </style>
    <script src="../src/jquery.min.js"></script>
</head>
<body>
    <?php
    include_once('search_db.php');
    ?>
    <div class="container mt-4">
        <p><h2>Inregistrari Speedtest</h2></p>
        <h6 class="mt-5"><b>Cauta Nume Locatie</b></h6>
        <div class="input-group mb-4 mt-3">
            <div class="form-outline">
                <input type="text" id="getName">
            </div>
        </div>
        <div id="" class="form-text float-start">Clic pe ID pentru vizualizare poza speedtest.</div>
        <table class=" table table-striped">
            <thead>
                <tr class="aliniere">
                    <th>ID</th>
                    <th>Locatie</th>
                    <th>Provider</th>
                    <th>IP</th>
                    <th>
                        <div>Ping</div>
                        <div>ms</div>
                    </th>
                    <th>
                        <div>Jitter</div>
                        <div class="aliniere">ms</div>
                    </th>
                    <th>
                        <div>Download</div>
                        <div>Mbps</div>
                    </th>
                    <th>
                        <div>Upload</div>
                        <div>Mbps</div>
                    </th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody class="aliniere" id="showdata" >
                <?php

                    $sql = "SELECT * FROM speedtest_users order BY timestamp DESC";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                        <td><h6><a href="./?id=<?php echo $row['id'] ?>" target="_blank"><?php echo $row['id'] ?></h6></td>
                        <td><h6><?php echo $row['extra'] ?></h6></td>
                        <td><h6><?php echo $row['log'] ?></h6></td>
                        <td><h6><?php echo $row['ip'] ?></h6></td>
                        <td><h6><?php echo $row['ping'] ?></h6></td>
                        <td><h6><?php echo $row['jitter'] ?></h6></td>
                        <td><h6><?php echo $row['dl'] ?></h6></td>
                        <td><h6><?php echo $row['ul'] ?></h6></td>
                        <td><h6><?php echo $row['timestamp'] ?></h6></td>
                        </tr>
                        <?php
                    }

                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function(){
            $('#getName').on("keyup", function() {
                var getName = $(this).val();
                $.ajax({
                    method:'POST',
                    url:'searchajax.php',
                    data:{name:getName},
                    success:function(response)
                    {
                        $("#showdata").html(response);
                    }
                })
            });
        });
    </script>
</body>
</html>



