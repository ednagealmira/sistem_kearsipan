                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-9">
                            <form action="<?= base_url('user/registrasinaskah'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="jnaskah" class="col-sm-3 col-form-label">Jenis Naskah</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="jnaskah" id="jnaskah">
                                            <option value="" selected hidden>Pilih Jenis Naskah</option>
                                            <?php foreach($jnaskah as $jn) : ?>
                                            <?php if($jn['id'] == set_value('jnaskah')) : ?>
                                            <option value="<?= $jn['id']; ?>" selected hidden><?= $jn['jenis']; ?></option>
                                            <?php endif; ?>
                                            <option value="<?= $jn['id']; ?>"><?= $jn['jenis']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('jnaskah', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tperkembangan" class="col-sm-3 col-form-label">Tingkat Perkembangan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="tperkembangan" id="tperkembangan">
                                            <option value="" selected hidden>Pilih Tingkat Perkembangan</option>
                                            <?php foreach($tperkembangan as $tp) : ?>
                                            <?php if($tp['id'] == set_value('tperkembangan')) : ?>
                                            <option value="<?= $tp['id']; ?>" selected hidden><?= $tp['tperkembangan']; ?></option>
                                            <?php endif; ?>
                                            <option value="<?= $tp['id']; ?>"><?= $tp['tperkembangan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('tperkembangan', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tglnaskah" class="col-sm-3 col-form-label">Tanggal Naskah</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tglnaskah" name="tglnaskah" value="<?= set_value('tglnaskah'); ?>">
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
                                        <select class="form-control" name="turgensi" id="turgensi">
                                            <option value="" selected hidden>Pilih Tingkat Urgensi</option>
                                            <?php foreach($turgensi as $tu) : ?>
                                            <?php if($tu['id'] == set_value('turgensi')) : ?>
                                            <option value="<?= $tu['id']; ?>" selected hidden><?= $tu['urgensi']; ?></option>
                                            <?php endif; ?>
                                            <option value="<?= $tu['id']; ?>"><?= $tu['urgensi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('turgensi', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sifatnaskah" class="col-sm-3 col-form-label">Sifat Naskah</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="sifatnaskah" id="sifatnaskah">
                                            <option value="" selected hidden>Pilih Sifat Naskah</option>
                                            <?php foreach($sifatnaskah as $sn) : ?>
                                            <?php if($sn['id'] == set_value('sifatnaskah')) : ?>
                                            <option value="<?= $sn['id']; ?>" selected hidden><?= $sn['sifat']; ?></option>
                                            <?php endif; ?>
                                            <option value="<?= $sn['id']; ?>"><?= $sn['sifat']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('sifatnaskah', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kategoriarsip" class="col-sm-3 col-form-label">Kategori Arsip</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="kategoriarsip" id="kategoriarsip">
                                            <option value="" selected hidden>Pilih Kategori Arsip</option>
                                            <?php foreach($kategoriarsip as $ka) : ?>
                                            <?php if($ka['id'] == set_value('kategoriarsip')) : ?>
                                            <option value="<?= $ka['id']; ?>" selected hidden><?= $ka['kategoriarsip']; ?></option>
                                            <?php endif; ?>
                                            <option value="<?= $ka['id']; ?>"><?= $ka['kategoriarsip']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('kategoriarsip', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="taksespublik" class="col-sm-3 col-form-label">Tingkat Akses Publik</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="taksespublik" id="taksespublik">
                                            <option value="" selected hidden>Pilih Tingkat Akses Publik</option>
                                            <?php foreach($taksespublik as $tap) : ?>
                                            <?php if($tap['id'] == set_value('taksespublik')) : ?>
                                            <option value="<?= $tap['id']; ?>" selected hidden><?= $tap['taksespublik']; ?></option>
                                            <?php endif; ?>
                                            <option value="<?= $tap['id']; ?>"><?= $tap['taksespublik']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('taksespublik', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="refbalasan" class="col-sm-3 col-form-label">Referensi Balasan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="refbalasan" name="refbalasan" value="<?= set_value('refbalasan'); ?>">
                                        <?= form_error('refbalasan', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div> -->
                                <div class="form-group row justify-content-center">Pengirim</div>
                                <div class="form-group row">
                                    <label for="instansipengirim" class="col-sm-3 col-form-label">Instansi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="instansipengirim" name="instansipengirim" value="<?= set_value('instansipengirim'); ?>">
                                        <?= form_error('instansipengirim', '<small class="text-danger pl-3">', '</small>') ; ?>
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
                                    <label for="penerima" class="col-sm-3 col-form-label">Kepada</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="penerima" name="penerima" value="<?= set_value('penerima'); ?>">
                                        <?= form_error('penerima', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tembusan" class="col-sm-3 col-form-label">Tembusan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tembusan" name="tembusan" value="<?= set_value('tembusan'); ?>">
                                        <?= form_error('tembusan', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mediaarsip" class="col-sm-3 col-form-label">Media Arsip</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="mediaarsip" id="mediaarsip">
                                            <option value="" selected hidden>Pilih Media Arsip</option>
                                            <?php foreach($mediaarsip as $ma) : ?>
                                            <?php if($ma['id'] == set_value('mediaarsip')) : ?>
                                            <option value="<?= $ma['id']; ?>" selected hidden><?= $ma['media_arsip']; ?></option>
                                            <?php endif; ?>
                                            <option value="<?= $ma['id']; ?>"><?= $ma['media_arsip']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('mediaarsip', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bahasa" class="col-sm-3 col-form-label">Bahasa</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="bahasa" id="bahasa">
                                            <option value="" selected hidden>Pilih Bahasa</option>
                                            <?php foreach($bahasa as $b) : ?>
                                            <?php if($b['id'] == set_value('bahasa')) : ?>
                                            <option value="<?= $b['id']; ?>" selected hidden><?= $b['bahasa']; ?></option>
                                            <?php endif; ?>
                                            <option value="<?= $b['id']; ?>"><?= $b['bahasa']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('bahasa', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="isiringkas" class="col-sm-3 col-form-label">Isi Ringkas</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" id="isiringkas" name="isiringkas"><?= set_value('isiringkas'); ?></textarea>
                                        <?= form_error('isiringkas', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tesaurus" class="col-sm-3 col-form-label">Tesaurus</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tesaurus" name="tesaurus" value="<?= set_value('tesaurus'); ?>">
                                        <?= form_error('tesaurus', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="statusvital" class="col-sm-3 col-form-label">Status Vital Arsip</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="statusvital" id="statusvital">
                                            <option value="" selected hidden>Pilih Status Vital Arsip</option>
                                            <?php foreach($statusvital as $sv) : ?>
                                            <?php if($sv['id'] == set_value('statusvital')) : ?>
                                            <option value="<?= $sv['id']; ?>" selected hidden><?= $sv['statusvital']; ?></option>
                                            <?php endif; ?>
                                            <option value="<?= $sv['id']; ?>"><?= $sv['statusvital']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('statusvital', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= set_value('jumlah'); ?>">
                                        <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="satuanjumlah" id="satuanjumlah">
                                            <option value="" selected hidden>Pilih Satuan Jumlah</option>
                                            <?php foreach($satuanjumlah as $sj) : ?>
                                            <?php if($sj['id'] == set_value('satuanjumlah')) : ?>
                                            <option value="<?= $sj['id']; ?>" selected hidden><?= $sj['satuanjumlah']; ?></option>
                                            <?php endif; ?>
                                            <option value="<?= $sj['id']; ?>"><?= $sj['satuanjumlah']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('satuanjumlah', '<small class="text-danger pl-3">', '</small>') ; ?>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-2">
                                        <a href="javascript:history.back()" class="btn btn-secondary btn-block">Batal</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary btn-block">Lanjut</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
