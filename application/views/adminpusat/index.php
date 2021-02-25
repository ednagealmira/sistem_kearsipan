                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-7">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-7">
                            <td>
                                <p>Silahkan pilih pengaturan naskah.</p>
                            </td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pilih Satu Pengaturan...‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="adminpusat/naskahbahasa">Pengaturan Bahasa</a>
                                    <a class="dropdown-item" href="adminpusat/jenisnaskah">Pengaturan Jenis Naskah</a>
                                    <a class="dropdown-item" href="adminpusat/mediaarsip">Pengaturan Media Arsip</a>
                                    <a class="dropdown-item" href="adminpusat/sifatnaskah">Pengaturan Sifat Naskah</a>
                                    <a class="dropdown-item" href="adminpusat/tperkembangan">Pengaturan Tingkat Perkembangan</a>
                                    <a class="dropdown-item" href="adminpusat/urgensi">Pengaturan Tingkat Urgensi</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p></p>

                </div>
                <!-- /.container-fluid -->
            </div>
