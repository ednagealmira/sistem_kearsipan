                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-8">
                            <?= $this->session->flashdata('message'); ?>
                            <a href="<?= base_url('adminpusat/templatedoc_upload'); ?>" class="btn btn-primary mb-3">Upload Template</a> 
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
