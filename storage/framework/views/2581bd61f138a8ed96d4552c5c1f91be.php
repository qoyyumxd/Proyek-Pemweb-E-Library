

<?php $__env->startSection('title', 'Dashboard Siswa'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4 text-center">
  <h2 class="mb-2">Selamat Datang, <?php echo e(auth()->user()->name); ?></h2>
    <p class="mb-4">Daftar Buku Tersedia</p>
  <div class="row d-flex justify-content-center">
    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card shadow" style="height: 100%;">
          <img src="<?php echo e(asset('images/books/' . $book->image)); ?>" class="card-img-top" alt="<?php echo e($book->title); ?>" style="max-height: 200px; object-fit: cover;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-truncate"><?php echo e($book->title); ?></h5>
            <p class="card-text text-muted"><strong>Pengarang:</strong> <?php echo e($book->author); ?></p>
            <div class="mt-auto">
            <form action="<?php echo e(route('borrow.book', $book->id)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin meminjam buku ini?')">
              <?php echo csrf_field(); ?>
              <button class="btn btn-primary w-100">Ajukan Pinjaman</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sistem-perpustakaan_kel8\sistem-perpustakaan\resources\views/siswa/dashboard.blade.php ENDPATH**/ ?>