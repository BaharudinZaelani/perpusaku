<div class="wrp">
    <?= getNavbar(); ?>
    <div class="content">
        <h3>Api List for consum</h3>
        <span>This API no need token by the way, excapt upload book</span>
        <table cellpadding="10" class="table">
            <thead>
                <tr>
                    <th>METHOD</th>
                    <th>URI</th>
                    <th>FOR</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>GET</td>
                    <td>http://127.0.0.1:3000/api?key=get_all</td>
                    <td>Untuk mengambil semua data buku</td>
                </tr>
            </tbody>
        </table>
        <br>
        <h3>Parameter</h3>
        <span>Example : ?key=value</span>
        <table class="table" cellpadding="10">
            <thead>
                <tr>
                    <th>METHOD</th>
                    <th>KEY</th>
                    <th>REQUIRE Other Parameter</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>GET</td>
                    <td>key=get_all</td>
                    <td>NO</td>
                </tr>
                <tr>
                    <td>POST</td>
                    <td>key=upload_buku</td>
                    <td>YES</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>