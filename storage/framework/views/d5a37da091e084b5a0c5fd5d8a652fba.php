

<?php $__env->startSection('title', 'Riwayat Peminjaman'); ?>

<?php $__env->startSection('content'); ?>
<h4>Riwayat Peminjaman Anda</h4>
<table class="table">
  <thead>
    <tr>
      <th>Buku</th>
      <th>Tanggal Peminjaman</th>
      <th>Tanggal Pengembalian</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($transaction->book->title); ?></td>
        <td><?php echo e($transaction->borrowed_at); ?></td>
        <td><?php echo e($transaction->returned_at ?? 'Belum dikembalikan'); ?></td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sistem-perpustakaan_kel8\sistem-perpustakaan\resources\views/siswa/history.blade.php ENDPATH**/ ?>