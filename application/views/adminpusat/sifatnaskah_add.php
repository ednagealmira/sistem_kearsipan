                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-8">
                            <form action="<?= base_url('adminpusat/sifatnaskah_add'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="sifat" class="col-sm-2 col-form-label">Sifat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="sifat" name="sifat" value="<?= set_value('sifat'); ?>">
                                            <?= form_error('sifat', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->