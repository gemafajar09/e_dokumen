<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <h4>Laporan Upload Data</h4><hr>
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="month" name="tangal_awal" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <h4><center>-</center></h4>
                        </div>
                        <div class="col-md-4">
                            <input type="month" name="tangal_awal" class="form-control">
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
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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
    series: [{
        name: 'Jumlah Data Upload: 87',
        data: [7.0, 6.9, 9.5, 0, 0, 0,0, 0, 0, 0, 0, 0]
    }]
});
</script>