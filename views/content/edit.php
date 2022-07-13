<?php 

$data = getAllBuku();
$result = [];
foreach ( $data as $row ) {
    if ( $row['id'] == $itemId ) {
        $result[] = $row;
    }
}
$result = $result[0];
?>
<div class="wrp">
    <!-- Front End -->
    <style>
        .show {
            display: block !important;
        }
        #tambahForm {
            display: none;
        }
    </style>
    <form method="post">
        <div class="tools header justify-start">
            <a href="/dashboard.php" class="btn bg-warning"> < Kembali ke dashboard</a>
        </div>
        <!-- tambah form -->
        <div class="show" id="tambahForm">
            <div class="input-form">
                <input type="text" id="nama" name="nama" placeholder="masukan nama buku" value="<?= $result['nama']; ?>">
            </div>
            <div class="input-form">
                <input type="text" name="pengarang" placeholder="Masukan pengarang" value="<?= $result['pengarang']; ?>">
            </div>
            <div class="input-form">
                <label for="tahun">Tahun Terbit</label>
                <input type="date" name="tahun_terbit" id="tahun" value="<?= $result['tahun_terbit']; ?>">
            </div>
            <div class="input-form">
                <label for="deskripsi">Deskripsi Buku</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"><?= $result['deskripsi']; ?></textarea>
            </div>
            <div class="input-submit">
                <button class="btn btn-success" name="submitBuku">Edit Buku</button>
            </div>
        </div>
    </form>

</div>


<!-- Backend -->
<?php 
// jika tombol logout ditekan
if( isset($_POST['logout']) ){
    logout();
    header("Location: login.php");
}
// jika tombol tambah ditekan (tambah dalam form)
if( isset($_POST['submitBuku']) ){
    $nama = $_POST['nama'];
    $pengarang = $_POST['pengarang'];
    $deskripsi = $_POST['deskripsi'];
    $tahun = $_POST['tahun_terbit'];
    $res = queryOnce("UPDATE `buku` SET `nama` = '$nama', `deskripsi` = '$deskripsi', `pengarang` = '$pengarang', `tahun_terbit` = '$tahun' WHERE `buku`.`id` = $itemId;");
    echo "
        <script>alert('$nama berhasil diubah !')</script>
    ";
    redirect("/dashboard.php");
}

?>