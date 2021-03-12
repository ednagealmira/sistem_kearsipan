                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <?= $this->session->flashdata('message'); ?>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kepada</th>
                                            <th>Hal</th>
                                            <th>Isi Ringkas</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($listnaskah as $n) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $n['penerima']; ?></td>
                                            <td><?= $n['hal']; ?></td>
                                            <td><?= $n['isi']; ?></td>
                                            <td><?= date('d-m-Y', $n['tgl_naskah']); ?></td>
                                            <td>
                                                <a href="<?= base_url('user/detailnaskah/') . $n['id']; ?>" class="btn btn-info btn-circle btn-sm">
                                                    <i class="fas fa-fw fa-info"></i>
                                                </a>
                                                <?php if($user['role_id'] == 1) : ?>
                                                <a href="<?= base_url('user/naskahdelete/') . $n['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Anda yakin ingin menghapus naskah <?= $n['hal']; ?>?')">
                                                    <i class="fas fa-fw fa-trash"></i>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
