                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-10">
                            <form action="<?= base_url('user/registrasinaskah'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="jnaskah" class="col-sm-3 col-form-label">Jenis Naskah</label>
                                    <div class="col-sm-9">
                                        <select class="form-control col-sm-10" name="jnaskah" id="jnaskah">
                                            <option value="" selected hidden>Pilih Jenis Naskah</option>
                                            <!-- <?php foreach($jnaskah as $jn) : ?>
                                            <option value="<?= $jn['id']; ?>"><?= $jn['jnaskah']; ?></option>
                                            <?php endforeach; ?> -->
                                        </select>
                                        <!-- <?= form_error('jnaskah', '<small class="text-danger pl-3">', '</small>') ; ?> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tperkembangan" class="col-sm-3 col-form-label">Tingkat Perkembangan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control col-sm-10" name="tperkembangan" id="tperkembangan">
                                            <option value="" selected hidden>Pilih Tingkat Perkembangan</option>
                                            <!-- <?php foreach($tperkembangan as $tp) : ?>
                                            <option value="<?= $tp['id']; ?>"><?= $tp['tperkembangan']; ?></option>
                                            <?php endforeach; ?> -->
                                        </select>
                                        <!-- <?= form_error('tperkembangan', '<small class="text-danger pl-3">', '</small>') ; ?> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tglnaskah" class="col-sm-3 col-form-label">Tanggal Naskah</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control col-sm-10" id="tglnaskah" name="tglnaskah">
                                        <?= form_error('tglnaskah', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nonaskah" class="col-sm-3 col-form-label">Nomor Naskah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nonaskah" name="nonaskah" value="<?= set_value('nonaskah'); ?>">
                                            <?= form_error('nonaskah', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="noagenda" class="col-sm-3 col-form-label">Nomor Agenda</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="noagenda" name="noagenda" value="<?= set_value('noagenda'); ?>">
                                            <?= form_error('noagenda', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hal" class="col-sm-3 col-form-label">Hal</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="hal" name="hal" value="<?= set_value('hal'); ?>">
                                            <?= form_error('hal', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="turgensi" class="col-sm-3 col-form-label">Tingkat Urgensi</label>
                                    <div class="col-sm-9">
                                        <select class="form-control col-sm-10" name="turgensi" id="turgensi">
                                            <option value="" selected hidden>Pilih Tingkat Urgensi</option>
                                            <!-- <?php foreach($turgensi as $tu) : ?>
                                            <option value="<?= $tu['id']; ?>"><?= $tu['turgensi']; ?></option>
                                            <?php endforeach; ?> -->
                                        </select>
                                        <!-- <?= form_error('turgensi', '<small class="text-danger pl-3">', '</small>') ; ?> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sifatnaskah" class="col-sm-3 col-form-label">Sifat Naskah</label>
                                    <div class="col-sm-9">
                                        <select class="form-control col-sm-10" name="sifatnaskah" id="sifatnaskah">
                                            <option value="" selected hidden>Pilih Sifat Naskah</option>
                                            <!-- <?php foreach($sifatnaskah as $sn) : ?>
                                            <option value="<?= $sn['id']; ?>"><?= $sn['sifatnaskah']; ?></option>
                                            <?php endforeach; ?> -->
                                        </select>
                                        <!-- <?= form_error('sifatnaskah', '<small class="text-danger pl-3">', '</small>') ; ?> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kategoriarsip" class="col-sm-3 col-form-label">Kategori Arsip</label>
                                    <div class="col-sm-9">
                                        <select class="form-control col-sm-10" name="kategoriarsip" id="kategoriarsip">
                                            <option value="" selected hidden>Pilih Kategori Arsip</option>
                                            <!-- <?php foreach($kategoriarsip as $ka) : ?>
                                            <option value="<?= $ka['id']; ?>"><?= $ka['kategoriarsip']; ?></option>
                                            <?php endforeach; ?> -->
                                        </select>
                                        <!-- <?= form_error('kategoriarsip', '<small class="text-danger pl-3">', '</small>') ; ?> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="taksespublik" class="col-sm-3 col-form-label">Tingkat Akses Publik</label>
                                    <div class="col-sm-9">
                                        <select class="form-control col-sm-10" name="taksespublik" id="taksespublik">
                                            <option value="" selected hidden>Pilih Tingkat Akses Publik</option>
                                            <!-- <?php foreach($taksespublik as $tap) : ?>
                                            <option value="<?= $tap['id']; ?>"><?= $tap['taksespublik']; ?></option>
                                            <?php endforeach; ?> -->
                                        </select>
                                        <!-- <?= form_error('taksespublik', '<small class="text-danger pl-3">', '</small>') ; ?> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="refbalasan" class="col-sm-3 col-form-label">Referensi Balasan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="refbalasan" name="refbalasan" value="<?= set_value('refbalasan'); ?>">
                                            <?= form_error('refbalasan', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">Pengirim</div>
                                <div class="form-group row">
                                    <label for="instansi" class="col-sm-3 col-form-label">Instansi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="instansi" name="instansi" value="<?= set_value('instansi'); ?>">
                                            <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namapengirim" class="col-sm-3 col-form-label">Nama Pengirim</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="namapengirim" name="namapengirim" value="<?= set_value('namapengirim'); ?>">
                                            <?= form_error('namapengirim', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jabatanpengirim" class="col-sm-3 col-form-label">Jabatan Pengirim</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="jabatanpengirim" name="jabatanpengirim" value="<?= set_value('jabatanpengirim'); ?>">
                                            <?= form_error('jabatanpengirim', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">Penerima</div>
                                <div class="form-group row">
                                    <label for="instansi" class="col-sm-3 col-form-label">Kepada</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="instansi" name="instansi" value="<?= set_value('instansi'); ?>">
                                            <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tembusan" class="col-sm-3 col-form-label">Tembusan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tembusan" name="tembusan" value="<?= set_value('tembusan'); ?>">
                                            <?= form_error('tembusan', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
