<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-7">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="col d-flex justify-content-center align-items-center mt-5">
            <img src="<?= base_url('assets/img/profile/') . $logo['logo']; ?>" alt="Logo" style="max-width: 30%;">
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login SPP Online</h1>
                </div>

                <?php echo $this->session->flashdata('message'); ?>

                <form class="user" method="post" action="">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="email" placeholder="Email" name="email" value="<?= set_value('email') ?>">
                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                    <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>