<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin'); ?>" class="brand-link d-flex align-items-center justify-content-center">
        <i class="fas fa-book fa-2x"></i>
        <span class="brand-text font-weight-bold mx-3">PERPUSTAKAAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="<?= base_url('profile'); ?>">
                    <img src="<?= base_url('assets'); ?>/img/profile/<?= $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
                </a>
            </div>
            <div class="info">
                <a href="<?= base_url('profile'); ?>" class="d-block"><?= $user['name']; ?></a>
            </div>
        </div>

        <?php
        $role_id = $this->session->userdata('role_id');

        $queryMenu = "SELECT    `user_menu`.`id`, `menu`, `judul`
                    FROM    `user_menu` JOIN `user_access_menu`
                    ON      `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE   `user_access_menu`.`role_id` = $role_id
                ORDER BY    `user_access_menu`.`menu_id` ASC
                ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach ($menu as $m) : ?>
                    <li class="nav-header">
                        <?= $m['judul']; ?>
                    </li>


                    <?php
                    $menuID = $m['id'];
                    $querySubMenu = "SELECT     *
                                                FROM        `user_sub_menu` JOIN `user_menu`
                                                ON          `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                                WHERE       `user_sub_menu`.`menu_id` = $menuID
                                                AND         `user_sub_menu`.`is_active` = 1
                                ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                    <?php foreach ($subMenu as $sm) : ?>
                        <li class="nav-item">
                            <a href="<?= base_url($sm['url']); ?>" class="nav-link <?php if ($title == $sm['title']) echo 'active'; ?> ">
                                <i class="nav-icon <?= $sm['icon']; ?>"></i>
                                <p>
                                    <?= $sm['title']; ?>
                                </p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li>
                        <hr style="border-top:1px solid grey;">
                    </li>
                <?php endforeach; ?>
                <li class="nav-item mb-4">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>