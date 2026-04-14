<?php 
include('db_conn.php');

if(isset($_GET['id_pemain'])){
    $id_pemain = $_GET['id_pemain'];

    $hapus =" DELETE FROM ahli WHERE id_pemain='$id_pemain'";

    if(mysqli_query($sambung,$hapus)){
        header("Location: index.php"); 


    }else{echo "Gagal".mysqli_error($conn);
}
}
mysqli_close($sambung);
?>