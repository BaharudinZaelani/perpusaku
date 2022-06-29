<div class="header">
    <h3><a href="/"><?= $title; ?></a></h3>
    <div class="tools">
        <a href="<?= URI ?>api.php">API</a>
        <a href="<?= URI ?>about.php">About Web</a>
        <?php if( !isset($_SESSION['user']) ) : ?>
            <a href="<?= URI ?>login.php">Login</a>
        <?php endif; ?>
    </div>
</div>
