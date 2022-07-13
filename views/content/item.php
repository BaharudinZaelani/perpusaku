<?php 

if ( isset($_POST['pinjam']) ) {
    $peminjam = "anonymous";
    $date = getTime();

    $query = "INSERT INTO `request` (`id`, `buku_id`, `peminjam`, `created_at`) VALUES (NULL, '$itemId', '$peminjam', '$date');";
    queryOnce($query);
    $statusPinjam = [
        "status" => "success",
        "message" => "dipinjam ! harap dikembalikan yaa :)"
    ];
}

?>
<div class="wrp">
    <?= getNavbar(); ?>

    <div class="d-item content">
        <div class="header">
            <a>
                <h3><?= $data['nama']; ?></h3>
            </a>
        </div>
        <table class="table">
            <tr>
                <th>Deskripsi</th>
                <td><?= $data['deskripsi']; ?></td>
            </tr>
            <tr>
                <th>pengarang</th>
                <td><?= $data['pengarang']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Terbit</th>
                <td><?= $data['tahun_terbit']; ?></td>
            </tr>
        </table>

        <?php if ( !isset($statusPinjam) ) { ?>
            <?php if ( empty($pinjam) ) { ?>
                <div class="content">
                    <form method="post">
                        <button name="pinjam" class="btn btn-dm btn-success">Pinjam Buku</button>
                    </form>
                </div>
            <?php }else { ?>
                <div class="content">
                    <h4>Buku sedang dipinjam !</h4>
                </div>
            <?php }?>
        <?php }else {?>
            <div class="contaner">
                <div class="alert alert-success">
                    <?= $statusPinjam['message']; ?>
                </div>
            </div>
        <?php }?>
    </div>
</div>


<!-- ?>
                            
                         -->