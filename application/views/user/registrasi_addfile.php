                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-8">
                        <?= $this->session->flashdata('message'); ?>
                        <!-- <?= form_open_multipart('prosesUpload'); ?>
                            <p>File Gambar</p>
                            <input type="file" name="gambar[]" multiple><br><br>
                            <button>Upload Gambar</button>
                        <?= form_close(); ?> -->
                            <?= form_open_multipart('user/registrasi_addfile'); ?>
                                <div class="form-group row">
                                    <div class="col-sm-2 col-form-label">Dokumen</div>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_naskah" name="file_naskah[]" multiple>
                                            <label class="custom-file-label" for="file_naskah">Pilih File</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Upload File</button>
                                    </div>
                                </div>
                            <?= form_close(); ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
