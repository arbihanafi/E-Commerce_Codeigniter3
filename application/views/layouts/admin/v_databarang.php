<div class="container-fluid">
    <!-- Page Heading -->
    <?php $this->load->view('./layouts/v_pemberitahuan'); ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <button data-toggle="modal" data-target="#tambah_aksi" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-plus fa-sm text-white-50"></i> Tambah Barang</button>
    </div>
    <hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Description</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Status</th>
                <th scope="col">Gambar</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($barang as $brg) : ?>
                <tr>
                    <td scope="row"><?php echo $no++ ?></td>
                    <td><?php echo $brg['nama_barang'] ?></td>
                    <td><?php echo $brg['description'] ?></td>
                    <td><?php echo $brg['kategori'] ?></td>
                    <td>Rp. <?php echo $brg['harga'] ?></td>
                    <td><?php echo $brg['stok'] ?></td>
                    <td><?php echo $brg['status'] ?></td>
                    <td><?php echo $brg['gambar'] ?></td>
                    <td <?php echo base_url('admin/data_barang/edit/' . $brg['id']) ?>>
                        <div type="button" data-toggle="modal" data-target="#edit_barang<?= $brg['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>
                    </td>
                    <td>
                        <a href="<?= base_url(); ?>admin/data_barang/delete/<?= $brg['id'] ?> " class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="tambah_aksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/data_barang/tambah_aksi'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori" id="">
                            <option value="0">-- Pilih Kategori --</option>
                            <option value="1">Elektronik</option>
                            <option value="2">Perabotan</option>
                            <option value="3">Alat Tulis</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Satuan</label>
                        <input type="text" name="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Stok Barang</label>
                        <input type="text" name="stok" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">File Gambar</label>
                        <input type="file" name="gambar" class="form-control" accept="image/png, image/jpg, image/jpeg, image/PNG">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal edit-->
<?php
$no = 1;
foreach ($barang as $brg) : ?>
    <div class="modal fade" id="edit_barang<?= $brg['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/data_barang/edit'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $brg['id'] ?>" name="id">
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="<?= $brg['nama_barang'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input type="text" name="description" class="form-control" value="<?= $brg['description'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <select name="kategori" id="" required>
                                <?php foreach ($kt as $x) :  ?>
                                    <?php if ($x['id'] == $brg['kategori_id']) : ?>
                                        <option value="<?= $x['id']; ?>" selected><?= $x['nama']; ?></option>
                                    <?php else :  ?>
                                        <option value="<?= $x['id']; ?>"><?= $x['nama']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Satuan</label>
                            <input type="text" name="harga" class="form-control" value="<?= $brg['harga'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Stok Barang</label>
                            <input type="text" name="stok" class="form-control" value="<?= $brg['stok'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">File Gambar</label>
                            <input type="file" name="gambar" class="form-control" accept="image/png, image/jpg, image/jpeg, image/PNG">
                            <img width="100px" src="<?php echo base_url('./assets/uploads/') ?><?php echo $brg['gambar'] ?>" alt="">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>