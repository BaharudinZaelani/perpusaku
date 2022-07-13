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
        <div id="tambah" class="btn bg-warning">Tambah Buku</div>
        <button class="btn bg-danger" name="logout">Logout</button>
    </div>
    <!-- tambah form -->
    <div class="" id="tambahForm">
        <div class="input-form">
            <input type="text" id="nama" name="nama" placeholder="masukan nama buku">
        </div>
        <div class="input-form">
            <input type="text" name="pengarang" placeholder="Masukan pengarang">
        </div>
        <div class="input-form">
            <label for="tahun">Tahun Terbit</label>
            <input type="date" name="tahun_terbit" id="tahun">
        </div>
        <div class="input-form">
            <label for="deskripsi">Deskripsi Buku</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
        </div>
        <div class="input-submit">
            <button class="btn btn-success" name="submitBuku">Tambah Buku</button>
        </div>
    </div>
</form>

<script>
    const tbl_tambah = document.getElementById("tambah");
    const tambahForm = document.getElementById("tambahForm");
    tbl_tambah.addEventListener("click", ()=> {
        tambahForm.classList.toggle("show");
    });
</script>

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
    $res = tambahBuku($_POST['nama'], $_POST['deskripsi'], $_POST['pengarang'], $_POST['tahun_terbit']);
    echo "
        <script>alert('$nama berhasil ditambahkan !')</script>
    ";
    redirect("/dashboard.php");
}

?>