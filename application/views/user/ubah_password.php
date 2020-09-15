

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

          <div class="row">
              <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
              </div>
          </div>

          <div class="row">
              <div class="col-lg-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="passwordLama">Password Lama</label>
                        <input type="password" class="form-control" id="passwordLama" placeholder="Password lama" name="passwordLama">
                        <?php echo form_error('passwordLama', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password baru</label>
                        <input type="password" class="form-control" id="password1" placeholder="Password baru" name="password1">
                        <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="password2">Konfirmasi password</label>
                        <input type="password" class="form-control" id="password2" placeholder="Ketik ulang password" name="password2">
                        <?php echo form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ubah Password</button>
                    </div>
                </form>
              </div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     