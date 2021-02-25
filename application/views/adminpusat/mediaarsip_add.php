                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-8">
                            <form action="<?= base_url('adminpusat/mediaarsip_add'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="media_arsip" class="col-sm-2 col-form-label">Media</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="media_arsip" name="media_arsip" value="<?= set_value('media_arsip'); ?>">
                                            <?= form_error('media_arsip', '<small class="text-danger pl-3">', '</small>') ; ?>
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