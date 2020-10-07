<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(''); ?>">
    <div class="sidebar-brand-icon">
      <i class="fas fa-school"></i>
    </div>
    <div class="sidebar-brand-text mx-3">E-SPP SMKN1PST</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- QUERY MENU -->

  <?php
  $role_id = $this->session->userdata('role_id');
  $queryMenu = "SELECT `user_menu`.`id`, `menu`
                FROM `user_menu` JOIN `user_access_menu` 
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
            WHERE `user_access_menu`.`role_id` = $role_id ORDER BY `user_access_menu`.`menu_id` ASC
            ";
  $menu = $this->db->query($queryMenu)->result_array();
  ?>

  <!-- LOOPING MENU -->
  <?php
  foreach ($menu as $m) { 
    if ($m['id'] == 1) {
      continue;
    } 
    ?>
    <div class="sidebar-heading">
      <?= $m['menu']; ?>
    </div>

    <!-- LOOP SUBMENU -->

    <?php
    
    $menuId = $m['id'];
    $querySubMenu = "SELECT *
              FROM `user_sub_menu` JOIN `user_menu` 
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
            WHERE `user_sub_menu`.`menu_id` = $menuId
              AND  `user_sub_menu`.`is_active` = 1
           ";
    $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>

    <?php foreach ($subMenu as $sm) { ?>
      <!-- Nav Item  -->
      <?php if ($title == $sm['judul']) : 7 ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>

        <a class="nav-link pb-0" href="<?= base_url($sm['url']) ?>">
          <i class="<?= $sm['icon'] ?>"></i>
          <span><?= $sm['judul'] ?></span></a>
        </li>
      <?php } ?>
      <!-- Divider -->
      <hr class="sidebar-divider mt-3">
    <?php } ?>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout') ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Sign Out</span></a>
    </li>







    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->