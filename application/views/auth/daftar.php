

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Halaman Registrasi</h1>
              </div>
              <form class="user" method="post" action="">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama lengkap" name="nama" value="<?php echo set_value('nama') ?>">
                  <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" placeholder="Alamat email" name="email" value="<?php echo set_value('email') ?>">
                  <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1" value="<?php echo set_value('password1') ?>">
                    <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Konfirmasi Password" name="password2" value="<?php echo set_value('password2') ?>">
                    <?php echo form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Registrasi
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?php echo base_url('auth') ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>