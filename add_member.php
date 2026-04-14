  <?php
    //Lengkapkan sambungan ke db
    include('db_conn.php');

    if (isset($_POST['hantar'])){
        // Lengkapkan pengambilan data dari borang
        $id_pemain= $_POST['id_pemain'];
        $nama_penuh= $_POST['nama_penuh'];
        $nama_gelaran= $_POST['nama_gelaran'];
        $peranan= $_POST['peranan'];

        // Lengkapkan proses memasukkan data ke dalam jadual ahli
       $sql = "INSERT INTO ahli (id_pemain, nama_penuh, nama_gelaran, peranan) 
        VALUES ('$id_pemain', '$nama_penuh', '$nama_gelaran', '$peranan')";
        $simpan = mysqli_query($sambung, "$sql");
        if($simpan){
            echo "<script>alert('Pendaftaran Berjaya!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Pendaftaran Gagal!');</script>";
        }
    }
?>

<html>
<head>
    <title>Daftar Ahli E-Sport</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <center>
    <h2>BORANG PENDAFTARAN AHLI E-SPORT</h2>
    
    <div style="width: 400px; background-color: #16213e; padding: 20px; border-radius: 10px; border: 2px solid #00d4ff;">
        <form action="" method="post">
            <table border="0" cellpadding="5" cellspacing="1" style="color: white; width: 100%;">
                <tr>
                    <td>ID PEMAIN</td>
                    <td>:</td>
                    <td><input type="text" name="id_pemain" placeholder="Cth: E001" required maxlength="5"></td>
                </tr>
                <tr>
                    <td>NAMA PENUH</td>
                    <td>:</td>
                    <td><input type="text" name="nama_penuh" required></td>
                </tr>
                <tr>
                    <td>NAMA GELARAN</td>
                    <td>:</td>
                    <td><input type="text" name="nama_gelaran" required></td>
                </tr>
                <tr>
                    <td>PERANAN</td>
                    <td>:</td>
                    <td>
                        <select name="peranan" id="peranan" required>
                            <option value="">-- Sila Pilih --</option>
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
                        <input type="submit" name="hantar" value="DAFTAR SEKARANG" class="btn-tambah" style="width: 100%;">
                        <br><br>
                        <a href="index.php" style="color: #ff4d4d; text-decoration: none; font-size: 12px;">Batal & Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </center>
</body>
</html>