                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-8">
                        <?= form_open_multipart('adminpusat/mediaedit/'. $media_edit['id']); ?>
                            <div class="form-group row">
                                <label for="media_arsip" class="col-sm-2 col-form-label">Media Arsip</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="media_arsip" name="media_arsip" value="<?= $media_edit['media_arsip']; ?>">
                                    <?= form_error('media_arsip', '<small class="text-danger pl-3">', '</small>') ; ?>
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