<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class=" text-center">Data User</h3>
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
                                <a href="<?= base_url('user/edit/' . $value['id']); ?>" class="btn btn-warning"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                <a href="<?= base_url('user/delete/' . $value['id']); ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>