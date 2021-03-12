                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    

                    <div class="row">
                        <div class="col-lg-8">
                            <?= $this->session->flashdata('message'); ?>
                            <a href="<?= base_url('adminpusat/mediaarsip_add'); ?>" class="btn btn-primary mb-3">Tambah</a> 
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-gradient-primary">
                            <h6 class="m-0 font-weight-bold text-white text-center">Daftar Media</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th width="5%" class="text-center">No</th>
                                            <th class="text-center">Media Arsip</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($media as $m) : ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?= $i; ?></th>
                                        <td><?= $m['media_arsip']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('adminpusat/mediaedit/') . $m['id']; ?>" class="btn btn-success btn-circle btn-sm mr-1">
                                                    <i class="fas fa-fw fa-pen"></i>
                                                </a>
                                                <a href="<?= base_url('adminpusat/mediadelete/') . $m['id']; ?>" class="btn btn-danger btn-circle btn-sm mr-1" onclick="return confirm('Anda yakin ingin menghapus media <?= $m['media_arsip']; ?> ?')">
                                                    <i class="fas fa-fw fa-trash"></i>
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