

<?php $__env->startSection('title', 'Dashboard Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <header class="d-flex justify-content-between align-items-center mb-4">
        <h2>Selamat Datang, Admin!</h2>
        <button class="btn btn-danger">Logout</button>
    </header>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Jumlah Buku Dipinjam</h5>
                    <p>Hari Ini: <?php echo e($borrowToday); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Peminjam Aktif</h5>
                    <p><?php echo e($activeBorrowers); ?> Orang</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5>Total Stok Buku</h5>
                    <p><?php echo e($bookStock); ?> Buku</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('activityChart').getContext('2d');
    var activityChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($bookTitles, 15, 512) ?>,
            datasets: [{
                label: 'Jumlah Buku Dipinjam',
                data: <?php echo json_encode($borrowCounts, 15, 512) ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sistem-perpustakaan_kel8\sistem-perpustakaan\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>