                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="card mb-4 py-3 border-left-primary">
                        <div class="card-body">
                            <table>
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

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
