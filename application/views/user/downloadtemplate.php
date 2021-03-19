                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-gradient-primary">
                            <h6 class="m-0 font-weight-bold text-white text-center">Daftar Template</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal Upload</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($templates as $t) : ?>
                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td><?= $t['template_desc']; ?></td>
                                            <td><?= date('d-m-Y', $t['upload_date']); ?></td>
                                            <td>
                                                <a href="<?= base_url('user/templatedownload/') . $t['id']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fas fa-fw fa-file-download"></i>
                                                </a>
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
