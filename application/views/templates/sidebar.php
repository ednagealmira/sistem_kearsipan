        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-mail-bulk"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SI Kearsipan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider mb-0">

            <!-- looping menu -->
            <?php foreach ($menu as $m) : ?>
            <div class="sidebar-heading mt-3">
                <?= $m['menu']; ?>
            </div>
                <?php $menu_id = $m['id']; ?>
                <?php for ($i=0; $i < count($submenu[$menu_id]); $i++) : ?>
                    <?php if($title == $submenu[$menu_id][$i]['title']) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link pb-0" href=<?= base_url($submenu[$menu_id][$i]['url']); ?>>
                        <i class="<?= $submenu[$menu_id][$i]['icon']; ?>"></i>
                        <span><?= $submenu[$menu_id][$i]['title']; ?></span></a>
                </li>
                <?php endfor; ?>

                <!-- Divider -->
                <hr class="sidebar-divider mt-3 mb-0">

            <?php endforeach; ?>
            
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