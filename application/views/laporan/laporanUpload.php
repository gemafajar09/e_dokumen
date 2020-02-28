<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <h4>Laporan Upload Data</h4><hr>
                <form action="<?= base_url('carigrafik') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="date" name="tanggal_awal" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <h4><center>-</center></h4>
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="tanggal_akhir" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="chart"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
	Highcharts.chart('chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Grafik Upload File'
    },
    subtitle: {
        text: ''
    },
    <?php foreach($grafik as $bulan){
        $data_bulan[] = $bulan->bulan;
    } ?>
    xAxis: {
        categories: <?= json_encode($data_bulan) ?>
    },
    yAxis: {
        title: {
            text: 'Upload'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },

    <?php 
    $hasil = 0;
    foreach($grafik as $jumlah){
        $data_grafik[] = (int)$jumlah->jumlah;
        $hasil += $jumlah->jumlah;
    } 
    
    ?>
    series: [{
        name: 'Jumlah Data Upload: <?= $hasil ?>',
        data: <?= json_encode($data_grafik) ?>
    }]
});
</script>