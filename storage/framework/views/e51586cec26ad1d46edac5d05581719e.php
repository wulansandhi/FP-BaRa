<?php $__env->startSection('content'); ?>
    <!-- Your specific page content goes here -->
    <!-- For example: -->
    <div class="text-center">
        <h1>Profil</h1>
        <form action="<?php echo e(route('profile.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" name="namaPengguna" id="namaPengguna" placeholder="Isikan nama...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Isikan email...">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telephone</label>
                <input type="number" class="mx-1" name="tel" id="tel" placeholder="Masukkan nomor telepon...">
              </div>
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-1">Jenis Kelamin</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" id="kelamin" value="lelaki">
                    <label class="form-check-label" for="gridRadios1">
                      Laki-laki
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" id="kelamin" value="perempuan">
                    <label class="form-check-label" for="kelamin">
                      Perempuan
                    </label>
                    <p>
                  </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Tentang Saya</label>
                <textarea class="form-control" name="tentangSaya" id="tentangSaya" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>

    </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\FW\FP_Bara\resources\views/profile/create.blade.php ENDPATH**/ ?>