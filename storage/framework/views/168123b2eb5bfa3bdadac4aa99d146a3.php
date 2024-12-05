<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h4 class="text-center">Dashboard</h4>
            <nav>
                <ul>
                    <?php if(auth()->user()->role == 'admin'): ?>
                        <li><a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">Dashboard Admin</a></li>
                        <li><a href="<?php echo e(route('books.index')); ?>" class="nav-link">Kelola Buku</a></li>
                    <?php elseif(auth()->user()->role == 'siswa'): ?>
                        <li><a href="<?php echo e(route('siswa.dashboard')); ?>" class="nav-link">Dashboard Siswa</a></li>
                        <li><a href="<?php echo e(route('history')); ?>" class="nav-link">Riwayat</a></li>
                    <?php elseif(auth()->user()->role == 'kepala_perpustakaan'): ?>
                        <li><a href="<?php echo e(route('kepala.dashboard')); ?>" class="nav-link">Dashboard Kepala</a></li>
                        <li><a href="<?php echo e(route('kepala.reports')); ?>" class="nav-link">Laporan</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH D:\xampp\htdocs\sistem-perpustakaan_kel8\sistem-perpustakaan\resources\views/layouts/app.blade.php ENDPATH**/ ?>