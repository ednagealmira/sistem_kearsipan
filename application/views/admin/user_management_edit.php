                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-8">
                            <form action="<?= base_url('admin/useredit/') . $user_edit['id']; ?>" method="post">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user_edit['nama']; ?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $user_edit['jabatan']; ?>">
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $user_edit['username']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                                    <select class="form-control col-sm-10" name="role_id" id="role_id">
                                        <?php foreach($roles as $r) : ?>
                                            <?php if($r['id'] == $user_edit['role_id']) : ?>
                                            <option value="<?= $r['id']; ?>" selected><?= $r['role']; ?></option>
                                            <?php else : ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="date_created" class="col-sm-2 col-form-label">Bergabung</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="date_created" name="date_created" value="<?= date('d F Y', $user_edit['date_created']); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->