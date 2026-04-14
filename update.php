<?php 
// 1. Lengkapkan sambungan ke db
include('db_conn.php');

// 2. Lengkapkan proses mendapatkan data asal berdasarkan ID dari URL
if(isset($_GET['id_pemain'])){
    $id = $_GET['id_pemain'];

    $sql = "SELECT * FROM ahli ";
    $hantar = mysqli_query($sambung,$sql);
    $res = mysqli_fetch_array($hantar);
}
?>

<html>
<head>
    <title>Kemaskini Ahli E-Sport</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <center>
    <h2>BORANG KEMASKINI MAKLUMAT AHLI</h2>
    
    <div style="width: 450px; background-color: #16213e; padding: 20px; border-radius: 10px; border: 2px solid #ffca28;">
        <form action="" method="post">
            <table border="0" cellpadding="5" cellspacing="1" style="color: white; width: 100%;">
                <tr>
                    <td>ID PEMAIN</td>
                    <td>:</td>
                    <td><input type="text" name="id_pemain" value="<?php echo $res['id_pemain']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>NAMA PENUH</td>
                    <td>:</td>
                    <td><input type="text" name="nama_penuh" value="<?php echo $res['nama_penuh']; ?>" required></td>
                </tr>
                <tr>
                    <td>NAMA GELARAN</td>
                    <td>:</td>
                    <td><input type="text" name="nama_gelaran" value="<?php echo $res['nama_gelaran']; ?>" required></td>
                </tr>
                <tr>
                    <td>PERANAN</td>
                    <td>:</td>
                    <td>
                        <select name="peranan" required>
                            <option value="<?php echo $res['peranan'];?>">-- Kekalkan: <?php echo $res['peranan'];?> --</option>
                            <option value="Duelist / Entry Fragger">Duelist / Entry Fragger</option>
                            <option value="IGL (In-Game Leader)">IGL (In-Game Leader)</option>
                            <option value="Support / Sniper">Support / Sniper</option>
                            <option value="Controller / Smoker">Controller / Smoker</option>
                            <option value="Sentinel / Defender">Sentinel / Defender</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; padding-top: 20px;">
                        <input type="submit" name="hantar" value="KEMASKINI REKOD" class="btn-tambah" style="background: linear-gradient(45deg, #ffca28, #ff8c00); width: 100%;">
                        <br><br>
                        <a href="index.php" style="color: #ff4d4d; text-decoration: none; font-size: 12px;">Batal & Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </center>

<?php
    // Proses mengemaskini maklumat apabila butang hantar ditekan
    if (isset($_POST['hantar'])){
        $id_pemain = $_POST['id_pemain'];
        $nama_penuh = $_POST['nama_penuh'];
        $nama_gelaran = $_POST['nama_gelaran'];
        $peranan = $_POST['peranan'];

        // Mengemaskini semua medan termasuk nama_gelaran
        $sql_update = "UPDATE ahli SET 
                       nama_penuh = '$nama_penuh', 
                       nama_gelaran = '$nama_gelaran', 
                       peranan = '$peranan' 
                       WHERE id_pemain = '$id_pemain'";

        if(mysqli_query($sambung, $sql_update)){
            echo "<script>alert('Rekod berjaya dikemaskini!'); window.location='index.php';</script>"; 
        } else {
            echo "<script>alert('Ralat: Rekod tidak dapat dikemaskini');</script>";
        }
    }
?>
</body>
</html>