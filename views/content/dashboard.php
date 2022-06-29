<!-- backend -->
<?php 
// login log write
$_SESSION['log_login']['error'] = false;

// check if login exist
// true = alihkan ke login
if( !isset($_SESSION['user']) ){
    header("Location: login.php");
}

// get all buku
$bukus = getAllBuku();
?>

<!-- front end -->
<div class="wrp">
    <?= component("dashboard.navbar"); ?>
    <div class="content">
        <div class="header-welcome">
            <h3>Welcome to Dashboard Panel</h3>
            <span>Hallo <?= $_SESSION['user']['username']?></span>    
        </div>

        
        <div class="list-buku pt-1">
            <h3>List Buku</h3>
            <div class="d-grid col-2">
                <!-- col 1 -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>pengarang</th>
                            <!-- <th>Deskripsi</th> -->
                            <th>Tahun Terbit</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- loop here -->
                        <?php foreach( $bukus as $row ) : ?>
                            <tr>
                                <td><?= $row['id']?></td>
                                <td><?= $row['nama']?></td>
                                <td><?= $row['pengarang']?></td>
                                <!-- <td><?= $row['deskripsi']?></td> -->
                                <td><?= $row['tahun_terbit']?></td>
                                <td>
                                    <form method="post">
                                        <button class="btn bg-danger">Hapus</button>
                                        <button class="btn bg-success">Edit</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- col 2 -->
                <div class="edit">
                    Lorem, ipsum dolor.
                </div>
            </div>
        </div>
    </div>
</div>