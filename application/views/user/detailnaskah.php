                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card mb-4 py-3 border-left-primary">
                                <div class="card-body">
                                    <table class="table table-sm table-borderless" width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="pr-3">Nama Pengirim</th>
                                                <td class="pl-3"><?= $naskahdetail['nama_pengirim']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Jabatan</th>
                                                <td class="pl-3"><?= $naskahdetail['jabatan_pengirim']; ?></td>
                                            </tr>
                                            <tr>
                                                <?php if ($naskahdetail['pengirim'] == 'internal') : ?>
                                                <th scope="row" class="pr-3">Unit Kerja</th>
                                                <?php else : ?>
                                                <th scope="row" class="pr-3">Instansi</th>
                                                <?php endif; ?>
                                                <td class="pl-3"><?= $naskahdetail['instansi_pengirim']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Kepada</th>
                                                <td class="pl-3"><?= $naskahdetail['penerima']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Jenis Naskah</th>
                                                <td class="pl-3"><?= $naskahdetail['jenis']; ?></td>
                                            </tr>                                   
                                            <tr>
                                                <th scope="row" class="pr-3">Tingkat Perkembangan</th>
                                                <td class="pl-3"><?= $naskahdetail['tp']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Tanggal Naskah</th>
                                                <td class="pl-3"><?= date('d-m-Y', $naskahdetail['tgl_naskah']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Nomor Naskah</th>
                                                <td class="pl-3"><?= $naskahdetail['nomor']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Nomor Agenda</th>
                                                <td class="pl-3"><?= $naskahdetail['nomor_agenda']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Hal</th>
                                                <td class="pl-3"><?= $naskahdetail['hal']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Tingkat Urgensi</th>
                                                <td class="pl-3"><?= $naskahdetail['urgensi']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Sifat Naskah</th>
                                                <td class="pl-3"><?= $naskahdetail['sifat']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Kategori Arsip</th>
                                                <td class="pl-3"><?= $naskahdetail['kategori']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Tingkat Akses Publik</th>
                                                <td class="pl-3"><?= $naskahdetail['tap']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Media Arsip</th>
                                                <td class="pl-3"><?= $naskahdetail['media']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Bahasa</th>
                                                <td class="pl-3"><?= $naskahdetail['bahasa']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Isi Ringkas</th>
                                                <td class="pl-3"><?= $naskahdetail['isi']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="pr-3">Tesaurus</th>
                                                <td class="pl-3"><?= $naskahdetail['tesaurus']; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="pr-3">Status Vital Arsip</th>
                                                <td class="pl-3"><?= $naskahdetail['statusvital']; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="pr-3">Jumlah</th>
                                                <td class="pl-3"><?= $naskahdetail['jumlah']; ?> <?= $naskahdetail['sj']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- Button trigger modal -->
                                    <div class="form-group row justify-content-end">
                                        <div class="col-sm-2">
                                            <a href="javascript:history.back()" class="btn btn-secondary btn-block">Kembali</a>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#NaskahDigitalModal">Naskah Digital</button>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="NaskahDigitalModal" tabindex="-1" aria-labelledby="NaskahDigitalModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="NaskahDigitalModalLabel">Naskah Digital</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-sm table-borderless m-0" width="100%" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="pr-2">Pembuat</th>
                                                        <td class="pl-2"><?= $naskahdetail['instansi_pengirim']; ?>, <?= $naskahdetail['nama_pengirim']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="pr-2">Tanggal Upload</th>
                                                        <td class="pl-2"><?= date('d-m-Y', $naskahdetail['tgl_regis']); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-sm table-borderless" width="100%" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Naskah</th>
                                                    </tr>
                                                    <?php foreach ($filenaskah as $f) : ?>
                                                    <tr>
                                                        <td scope="row">
                                                            <a href="<?= base_url('user/naskahdownload/') . $f['id']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                            <i class="fas fa-fw fa-file-download"></i>
                                                            </a>
                                                            <?= $f['file_name']; ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
