        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-mail-bulk"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SI Kearsipan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider mb-0">

            <!-- looping menu -->
            <?php foreach ($menu as $m) : 
            if($m['menu'] != 'Profil') : ?>
            <div class="sidebar-heading mt-3">
                <?= $m['menu']; ?>
            </div>
                <?php $menu_id = $m['id'];
                for ($i=0; $i < count($submenu[$menu_id]); $i++) :
                if($title == $submenu[$menu_id][$i]['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif;
                    if($submenu[$menu_id][$i]['title'] == 'Registrasi Naskah') : ?>
                    <a class="nav-link pb-0" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="<?= $submenu[$menu_id][$i]['icon']; ?>"></i>
                        <span><?= $submenu[$menu_id][$i]['title']; ?></span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white collapse-inner rounded mb-0 mt-2">
                            <a class="collapse-item" href="<?= base_url('user/registrasinaskah/external'); ?>">Registrasi Naskah Masuk</a>
                            <a class="collapse-item" href="<?= base_url('user/registrasinaskah/internal'); ?>">Registrasi Naskah Keluar</a>
                        </div>
                    </div>
                    <?php else : ?>
                    <a class="nav-link pb-0" href=<?= base_url($submenu[$menu_id][$i]['url']); ?>>
                        <i class="<?= $submenu[$menu_id][$i]['icon']; ?>"></i>
                        <span><?= $submenu[$menu_id][$i]['title']; ?></span>
                    </a>
                    <?php endif; ?>
                </li>
                <?php endfor; ?>
                <!-- Divider -->
                <hr class="sidebar-divider mt-3 mb-0">
            <?php endif; endforeach; ?>
            
            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
                    <span>Logout</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->