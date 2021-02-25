                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-8">
                        <?= form_open_multipart('adminpusat/bahasaedit/'. $bahasa_edit['id']); ?>
                            <div class="form-group row">
                                <label for="bahasa" class="col-sm-2 col-form-label">Bahasa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="bahasa" name="bahasa" value="<?= $bahasa_edit['bahasa']; ?>">
                                    <?= form_error('bahasa', '<small class="text-danger pl-3">', '</small>') ; ?>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
