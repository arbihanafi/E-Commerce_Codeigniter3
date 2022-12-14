<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hero</h1>
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
                    <td <?php echo base_url('manager/hero/edit/' . $rows['id']) ?>>
                        <div type="button" data-toggle="modal" data-target="#editHero<?= $rows['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Modal edit -->
<?php
$no = 1;
foreach ($hero as $rows) : ?>
    <div class="modal fade" id="editHero<?= $rows['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('manager/hero/edit'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $rows['id'] ?>" name="id">
                        <div class="form-group">
                            <label for="">Label Hero</label>
                            <p><?php echo $rows['label'] ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <p><?php echo $rows['description'] ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">File Gambar</label>
                            <img width="100px" src="<?php echo base_url('./assets/uploads/') ?><?php echo $rows['file_foto'] ?>" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="">
                                <<?php foreach ($kt as $x) :  ?> <?php if ($x['id'] == $rows['status_id']) : ?> <option value="<?= $x['id']; ?>" selected><?= $x['nama']; ?></option>
                                <?php else :  ?>
                                    <option value="<?= $x['id']; ?>"><?= $x['nama']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
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