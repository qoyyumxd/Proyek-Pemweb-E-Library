

<?php $__env->startSection('title', 'Riwayat Peminjaman'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Riwayat Peminjaman</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($transaction->book->title); ?></td>
                <td><?php echo e($transaction->borrow_date); ?></td>
                <td><?php echo e($transaction->return_date); ?></td>
                <td><?php echo e(ucfirst($transaction->status)); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sistem-perpustakaan_kel8\sistem-perpustakaan\resources\views/siswa/history.blade.php ENDPATH**/ ?>