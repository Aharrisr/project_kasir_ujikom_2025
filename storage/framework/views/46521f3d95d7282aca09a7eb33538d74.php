<?php $__env->startSection('content'); ?>
    <div class="page-body">
        <div class="container-xl">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card shadow-lg p-3 mb-5 rounded">
                        <div class="card-header">
                            <h3 class="card-title">Laporan</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <?php if(Session::get('success')): ?>
                                        <div class="alert alert-success alert-dismissible d-flex align-items-center"
                                            role="alert">
                                            <div class="alert-icon me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon alert-icon icon-2">
                                                    <path d="M5 12l5 5l10 -10"></path>
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <?php echo e(Session::get('success')); ?>

                                            </div>
                                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(Session::get('warning')): ?>
                                        <div class="alert alert-danger alert-dismissible d-flex align-items-center"
                                            role="alert">
                                            <div class="alert-icon me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon alert-icon icon-2">
                                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                                    <path d="M12 8v4"></path>
                                                    <path d="M12 16h.01"></path>
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <?php echo e(Session::get('warning')); ?>

                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <form action="/laporan" method="get">
                                        <div class="row">
                                            <div class="col-10">
                                                <select class="form-select" name="bulan" id="bulan">
                                                    <option disabled selected>Pilih bulan</option>
                                                    <?php
                                                        $bulan_list = [
                                                            '01' => 'Januari',
                                                            '02' => 'Februari',
                                                            '03' => 'Maret',
                                                            '04' => 'April',
                                                            '05' => 'Mei',
                                                            '06' => 'Juni',
                                                            '07' => 'Juli',
                                                            '08' => 'Agustus',
                                                            '09' => 'September',
                                                            '10' => 'Oktober',
                                                            '11' => 'November',
                                                            '12' => 'Desember',
                                                        ];
                                                    ?>

                                                    <?php $__currentLoopData = $bulan_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $nama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value); ?>"
                                                            <?php echo e(request('bulan') == $value ? 'selected' : ''); ?>>
                                                            <?php echo e($nama); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                            <path d="M21 21l-6 -6" />
                                                        </svg>
                                                        Cari
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <button type="reset" id="reset" name="reset"
                                                        class="btn btn-danger" onclick="window.location.href='/laporan'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-restore">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3.06 13a9 9 0 1 0 .49 -4.087" />
                                                            <path d="M3 4.001v5h5" />
                                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                        </svg>
                                                        reset
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter card-table table-striped" id="tabellaporan">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" width="1%">No</th>
                                                        <th class="text-center" width="8%">Tanggal</th>
                                                        <th class="text-center" width="8%">Transaksi</th>
                                                        <th class="text-center" width="8%">bayar</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center" id="hasil-pencarian">
                                                    <?php $__currentLoopData = $data_transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo e($item->tanggal); ?></td>
                                                            <td><?php echo e($item->jenis); ?></td>
                                                            <td><?php echo e(number_format($item->bayar, 0, ',', '.')); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <h5>Total Penjualan: <span class="text-success">Rp
                                            <?php echo e(number_format($total_penjualan, 0, ',', '.')); ?></span></h5>
                                </div>
                                <div class="col-md-4">
                                    <h5>Total Pembelian: <span class="text-danger">Rp
                                            <?php echo e(number_format($total_pembelian, 0, ',', '.')); ?></span></h5>
                                </div>
                                <div class="col-md-4">
                                    <h5>Total Pendapatan: <span class="text-primary fw-bold">Rp
                                            <?php echo e(number_format($total_penjualan - $total_pembelian, 0, ',', '.')); ?></span>
                                    </h5>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <a href="<?php echo e(route('export.pdf', ['bulan' => request('bulan')])); ?>" target="_blank"
                                    class="btn btn-primary">
                                    Export PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('myscript'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let tabellaporan = document.querySelector("#tabellaporan tbody");

            updateRowNumbers();

            let observer = new MutationObserver(updateRowNumbers);
            observer.observe(tabellaporan, {
                childList: true
            });
        });

        function updateRowNumbers() {
            let tableRows = document.querySelectorAll("#tabellaporan tbody tr");
            tableRows.forEach((row, index) => {
                let firstCell = row.querySelector("td:first-child");
                if (firstCell) {
                    firstCell.textContent = index + 1;
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project kasir\kasir\resources\views/laporan/index.blade.php ENDPATH**/ ?>