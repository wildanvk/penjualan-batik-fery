<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>

<footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
        Sistem Informasi Penjualan
    </div>
    <strong>Copyright &copy; 2023 <a href="<?php echo base_url('/'); ?>">SIP Batik</a>.</strong> All rights
    reserved.
</footer>
</div>

<?php
if (isset($grafikTransaksi)) {
    if (count($grafikTransaksi) > 0) {
        foreach ($grafikTransaksi as $data) {
            $transaksiSelesai[] = $data['jumlah'];
            $bulanTransaksi[] = [$data['bulan']];
        }
    }
}
?>

<?php
if (isset($grafikPendapatan)) {
    if (count($grafikPendapatan) > 0) {
        foreach ($grafikPendapatan as $data) {
            $jumlahPendapatan[] = $data['total'];
            $bulanPendapatan[] = [$data['bulan']];
        }
    }
}
?>

<script src="<?php echo base_url('themes/plugins'); ?>/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('themes/plugins'); ?>/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url('themes/plugins'); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('themes/dist'); ?>/js/adminlte.min.js"></script>
<script src="<?php echo base_url('themes/dist'); ?>/js/filter.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url('themes/dist'); ?>/js/custom.js"></script>

<script>
// Chart Penjualan
var penjualanData = {
    labels: <?= json_encode($bulanTransaksi) ?>,
    datasets: [{
        label: "Total Penjualan",
        backgroundColor: "rgba(60,141,188,0.9)",
        borderColor: "rgba(60,141,188,0.8)",
        pointRadius: false,
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: <?= json_encode($transaksiSelesai) ?>,
    }, ],
};

var penjualanCanvas = $("#penjualan").get(0).getContext("2d");
var dataChartPenjualan = jQuery.extend(true, {}, penjualanData);
var temp0 = penjualanData.datasets[0];
dataChartPenjualan.datasets[0] = temp0;


var penjualanChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    datasetFill: false,
    scales: {
        yAxes: [{
            precision: 0,
            grid: {
                display: false,
            },
            display: true,
        }],
        xAxes: [{
            grid: {
                display: false,
            },
        }],
    },
};

var barChart = new Chart(penjualanCanvas, {
    type: "bar",
    data: dataChartPenjualan,
    options: penjualanChartOptions,
});

// Chart Pendapatan
var pendapatanData = {
    labels: <?= json_encode($bulanPendapatan) ?>,
    datasets: [{
        label: "Total Pendapatan",
        backgroundColor: "rgba(60,141,188,0.9)",
        borderColor: "rgba(60,141,188,0.8)",
        pointRadius: false,
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: <?= json_encode($jumlahPendapatan) ?>,
    }, ],
};

function formatRupiah(value) {
    var formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 2,
    });
    return formatter.format(value);
}

var pendapatanCanvas = $("#pendapatan").get(0).getContext("2d");
var dataChartPendapatan = jQuery.extend(true, {}, pendapatanData);
var temp0 = pendapatanData.datasets[0];
dataChartPendapatan.datasets[0] = temp0;


var pendapatanChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    datasetFill: false,
    scales: {
        yAxes: [{
            precision: 0,
            grid: {
                display: false,
            },
            display: true,
            ticks: {
                callback: function(value, index, values) {
                    return formatRupiah(value);
                },
            },
        }],
        xAxes: [{
            grid: {
                display: false,
            },
        }],
    },
};

var barChart = new Chart(pendapatanCanvas, {
    type: "bar",
    data: dataChartPendapatan,
    options: pendapatanChartOptions,
});
</script>
</body>

</html>