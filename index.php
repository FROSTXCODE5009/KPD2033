<?php
    include'db_conn.php';
?>

<html>
<head>
    <title>NASAt</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2>REKOD AHLI KELAB E-SPORT</h2>
    
    <center>
    <table>
        <thead>
            <tr>
                <th rowspan="2">ID PEMAIN</th>
                <th rowspan="2">NAMA PENUH</th>
                <th rowspan="2">NAMA GELARAN</th>
                <th rowspan="2">PERANAN</th>
                <th colspan="2">SELENGGARA</th>
            </tr>
            <tr>
                <th>KEMASKINI</th>
                <th>PADAM</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Memaparkan rekod ahli daripada pangkalan data 
            $papar = mysqli_query($sambung, "SELECT * FROM ahli");
            while($row = mysqli_fetch_array($papar)){
                //Lengkapkan kod berikut
                echo "<tr>
                    <td>".$row['id_pemain']."</td>
                    <td>".$row['nama_penuh']."</td>
                    <td>".$row['nama_gelaran']."</td>
                    <td>".$row['peranan']."</td>
                    <td><a href='update.php?id_pemain=".$row['id_pemain']."' class='action-link edit'>Kemaskini</a></td>
                    <td><a href='remove.php?id_pemain=".$row['id_pemain']."' class='action-link delete' onclick=\"return confirm('Rekod ini akan dihapuskan?')\">Padam</a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="add_member.php">
        <button class="btn-tambah">+ TAMBAH AHLI BAHARU</button>
    </a>
    </center>
</body>
</html>
