<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('admin/useradd'); ?>" class="btn btn-primary mb-3">Tambah Pengguna</a> 

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h6 class="m-0 font-weight-bold text-white text-center">Daftar Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Start date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u) : ?>
                        <tr>
                            <td><?= $u['nama']; ?></td>
                            <td><?= $u['jabatan']; ?></td>
                            <td><?= $u['username']; ?></td>
                            <td><?= $u['roleuser']; ?></td>
                            <td><?= date('d-m-Y', $u['date_created']); ?></td>
                            <td>
                                <a href="<?= base_url('admin/useredit/') . $u['id']; ?>" class="btn btn-success btn-circle btn-sm mr-1 btn-edit">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>
                                <a href="<?= base_url('admin/userdelete/') . $u['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Anda yakin ingin menghapus data <?= $u['nama']; ?> (<?= $u['jabatan']; ?>) ?')">
                                    <i class="fas fa-fw fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
