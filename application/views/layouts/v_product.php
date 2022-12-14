<style>
    card {
        box-shadow: 5px 10px #888888;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product</h1>
    </div>
    <hr>
    <div class="row">
        <?php foreach ($barang as $brg) : ?>
            <div class="card box-shadow ml-3" style="width: 16rem;">
                <img class="card-img-top" src="<?= base_url('./assets/uploads/'); ?><?= $brg['gambar']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $brg['nama_barang'] ?></h5>

                    <p><?= 'Rp' . number_format($brg['harga'], 0, ',', '.'); ?></p>
                    <p><?php echo $brg['kategori'] ?></p>
                    <p><?php echo $brg['description'] ?></p>

                    <button type="button" class="btn btn-info"><i class="fa-solid fa-plus"></i> Keranjang</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>