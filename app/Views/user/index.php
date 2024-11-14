<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class=" text-center">Data User</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-sm btn-flat btn-primary rounded  px-3" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"> Tambah</i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>No Telphone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key => $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_user']; ?></td>
                            <td><?= $value['email']; ?></td>
                            <td><?= $value['no_tlpn']; ?></td>
                            <td>
                                <a href="<?= base_url('UserController/edit/' . $value['id']); ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                <a href="<?= base_url('UserController/delete/' . $value['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('UserController/insert') ?>
                <div class="mb-3">
                    <label for="">Nama User</label>
                    <input type="text" name="nama_user" class="form-control" placeholder="Masukkan Nama">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email">
                </div>
                <div class="mb-3">
                    <label for="">No Telphone</label>
                    <input type="number" name="no_tlpn" class="form-control" placeholder="Masukkan No Telphone">
                </div>

                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>