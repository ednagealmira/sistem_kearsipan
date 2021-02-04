                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    
                    <div class="row">
                        <div class="col-lg-7">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>

                    <div class="card mb-3 col-lg-7">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/'); ?>img/ic_user.svg" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['nama']; ?>, <?= $user['jabatan']; ?></h5>
                                    <p class="card-text"><?= $user['username']; ?></p>
                                    <p class="card-text"><small class="text-muted">Bergabung pada <?= date('d F Y', $user['date_created']); ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->