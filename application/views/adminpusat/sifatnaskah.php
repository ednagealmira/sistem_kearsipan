                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    

                    <div class="row">
                        <div class="col-lg-8">
                            <?= $this->session->flashdata('message'); ?>
                            <a href="<?= base_url('adminpusat/sifatnaskah_add'); ?>" class="btn btn-primary mb-3">Tambah</a> 
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-gradient-primary">
                            <h6 class="m-0 font-weight-bold text-white text-center">Daftar Sifat</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th width="5%" class="text-center">No</th>
                                            <th class="text-center">Sifat Naskah</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($sifat as $s) : ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?= $i; ?></th>
                                        <td><?= $s['sifat']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('adminpusat/sifatedit/') . $s['id']; ?>" class="btn btn-success btn-circle btn-sm mr-1">
                                                    <i class="fas fa-fw fa-pen"></i>
                                                </a>
                                                <a href="<?= base_url('adminpusat/sifatdelete/') . $s['id']; ?>" class="btn btn-danger btn-circle btn-sm mr-1" onclick="return confirm('Anda yakin ingin menghapus sifat <?= $s['sifat']; ?> ?')">
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