<div class="wrp">
    <?= getNavbar(); ?>
    
    <!-- content -->
    <div class="content">
        <div class="items" id="items">

        </div>
    </div>
</div>
<script>
    let key = "get_all";
    axios.get('/api?key=' + key).then((res) => {
        let data = res.data.data;
        itemsLoop(data);
    });


    // foreach
    function itemsLoop(data){

        const itemContainer = document.getElementById("items");
        for( let i = 0; i < data.length; i++ ){
            let nama = data[i].nama;
            let deskripsi = data[i].deskripsi;
            let pengarang = data[i].pengarang;
            let tahun_terbit = data[i].tahun_terbit;
            
            let div = '<a href="#" class="card"> <img src="<?= asset("img/komik1.jpg"); ?>" alt=""> <div class="card-body"> <div class="card-title"> <h3>' + nama + '</h3> </div> <div class="card-description"> ' + deskripsi + ' </div> </div> </a>';
            
            itemContainer.appendChild(stringToHtml(div));
            // console.log(stringToHtml(div))
        }
    }
</script>