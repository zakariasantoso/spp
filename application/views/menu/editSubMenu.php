

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

          <form action="" method="post" class="col-lg-6">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Sub Menu" value="<?= $subMenu['judul'] ?>">
            </div>
            <div class="form-group">
                <label for="menu_id">Menu</label>
                <select name="menu_id" id="menu_id" class="form-control">
                    <option value="">Pilih Menu:</option>
                    <?php foreach ($menu as $m ) { ?>
                        <?php if ($m['id'] == $subMenu['menu_id']) { ?>
                            <option value="<?= $m['id']; ?>" selected><?= $m['menu'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" id="url" name="url" placeholder="Sub menu URL" value="<?= $subMenu['url'] ?>">
            </div>
            <div class="form-group">
                <label for="icon">icon</label>
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon" value="<?= $subMenu['icon'] ?>">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        value="1" 
                        id="is_active" 
                        name="is_active"
                        <?php if ($subMenu['is_active'] == 1) {
                            echo "checked";
                        } ?> 
                    />
                    <label class="form-check-label" for="is_active">
                        Active?
                    </label>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          

        </div>
        <!-- /.container-fluid -->

      </div>

     