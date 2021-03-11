                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="card mb-4 py-3 border-left-primary">
                        <div class="card-body">
                            <table class="mx-3">
                                <tbody>
                                    <tr>
                                        <th class="pr-3">Nama Pengirim</th>
                                        <td class="pl-3"><?= $naskahdetail['nama_pengirim']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Jabatan</th>
                                        <td class="pl-3"><?= $naskahdetail['jabatan_pengirim']; ?></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <?php if ($naskahdetail['pengirim'] == 'internal') : ?>
                                        <th class="pr-3">Unit Kerja</th>
                                        <?php else : ?>
                                        <th class="pr-3">Instansi</th>
                                        <?php endif; ?>
                                        <td class="pl-3"><?= $naskahdetail['instansi_pengirim']; ?></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Kepada</th>
                                        <td class="pl-3"><?= $naskahdetail['penerima']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Jenis Naskah</th>
                                        <td class="pl-3"><?= $naskahdetail['jenis']; ?></td>
                                    </tr>                                   
                                    <tr>
                                        <th class="pr-3">Tingkat Perkembangan</th>
                                        <td class="pl-3"><?= $naskahdetail['tp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Tanggal Naskah</th>
                                        <td class="pl-3"><?= $naskahdetail['tgl_naskah']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Nomor Naskah</th>
                                        <td class="pl-3"><?= $naskahdetail['nomor']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Nomor Agenda</th>
                                        <td class="pl-3"><?= $naskahdetail['nomor_agenda']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Hal</th>
                                        <td class="pl-3"><?= $naskahdetail['hal']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Tingkat Urgensi</th>
                                        <td class="pl-3"><?= $naskahdetail['urgensi']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Sifat Naskah</th>
                                        <td class="pl-3"><?= $naskahdetail['sifat']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Kategori Arsip</th>
                                        <td class="pl-3"><?= $naskahdetail['kategori']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Tingkat Akses Publik</th>
                                        <td class="pl-3"><?= $naskahdetail['tap']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Media Arsip</th>
                                        <td class="pl-3"><?= $naskahdetail['media']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Bahasa</th>
                                        <td class="pl-3"><?= $naskahdetail['bahasa']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Isi Ringkas</th>
                                        <td class="pl-3"><?= $naskahdetail['isi']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="pr-3">Tesaurus</th>
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
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
