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
                <div class="scroll">
                    <div class="scroll">
                        <table class="table" style="width: 100%;">
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
                                                <input type="text" hidden name="id" value="<?= $row['id']; ?>">
                                                <button class="btn bg-danger" name="hapus">Hapus</button>
                                                <a class="btn btn-success" href="edit.php/?key=edit&n=<?= $row['id']; ?>">Edit</a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- col 2 -->
                <div class="edit">
                    <div class="card">
                        <div class="card-body">
                            <h4>Peminjam</h4>
                        </div>
                    </div>

                    <!-- loop peminjam here -->
                    <?php foreach( $requestPinjam as $row ) : ?>
                        <div class="card">
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td>Peminjam</td>
                                        <td>: <?= $row['peminjam']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>nama Buku</td>
                                        <td>: 
                                            <?php 
                                            foreach ( $bukus as $buku ) {
                                                if ( $row['buku_id'] == $buku['id'] ) {
                                                    echo $buku['nama'];
                                                    break;
                                                }
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal meminjam</td>
                                        <td>: <?= $row['created_at']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form method="post">
                                                <input type="text" hidden name="idP" value="<?= $row['id'];?>">
                                                <button name="hapusPeminjam" class="btn btn-danger">Hapus Data</button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>