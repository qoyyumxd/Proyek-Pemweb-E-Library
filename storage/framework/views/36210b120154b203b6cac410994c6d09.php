

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Dashboard Kepala Perpustakaan</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Buku</h5>
                    <p><?php echo e($totalBooks); ?> Buku</p>
                </div>
            </div>
        </div>
        
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Total Siswa</h5>
                <p><?php echo e($totalStudents); ?> Siswa</p>
            </div>
        </div>
        
        <div class="card bg-warning text-dark">
            <div class="card-body">
                <h5>Buku Sedang Dipinjam</h5>
                <p><?php echo e($borrowedBooks); ?> Buku</p>
            </div>
        </div>
    </div>

    <!-- Grafik Aktivitas -->
    <div class="mt-4">
        <h4>Grafik Aktivitas Perpustakaan</h4>
        <canvas id="activityChart"></canvas>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\sistem-perpustakaan_kel8\sistem-perpustakaan\resources\views/kepala/dashboard.blade.php ENDPATH**/ ?>