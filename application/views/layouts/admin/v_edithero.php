<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Hero</h1>
        <button data-toggle="modal" data-target="#tambah_data" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-plus fa-sm text-white-50"></i> Tambah Data</button>
    </div>
    <hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Label Hero</th>
                <th scope="col">Description</th>
                <th scope="col">Gambar</th>
                <th scope="col">Status</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($hero as $rows) : ?>
                <tr>
                    <td scope="row"><?php echo $no++ ?></td>
                    <td><?php echo $rows['label'] ?></td>
                    <td><?php echo $rows['description'] ?></td>
                    <td><?php echo $rows['file_foto'] ?></td>
                    <td><?php echo $rows['status'] ?></td>
                    <td <?php echo base_url('admin/edit_hero/edit/' . $rows['id']) ?>>
                        <div type="button" data-toggle="modal" data-target="#edit_hero<?= $rows['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>
                    </td>
                    <td>
                        <a href="<?= base_url(); ?>admin/edit_hero/delete/<?= $rows['id'] ?> " class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/edit_hero/tambah_data'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Label Hero</label>
                        <input type="text" name="label" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">File Gambar</label>
                        <input type="file" name="file_foto" class="form-control" required>
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
<!-- Modal edit -->
<?php
$no = 1;
foreach ($hero as $rows) : ?>
    <div class="modal fade" id="edit_hero<?= $rows['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/edit_hero/edit'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $rows['id'] ?>" name="id">
                        <div class="form-group">
                            <label for="">Label Hero</label>
                            <input type="text" name="label" class="form-control" value="<?= $rows['label'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input type="text" name="description" class="form-control" value="<?= $rows['description'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">File Gambar</label>
                            <input type="file" name="file_foto" class="form-control" accept="image/png, image/jpg, image/jpeg, image/PNG">
                            <img width="100px" src="<?php echo base_url('./assets/uploads/') ?><?php echo $rows['file_foto'] ?>" alt="">
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