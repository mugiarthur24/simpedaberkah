<script src="<?php echo base_url('asset/grafik/code/highcharts.js') ?>"></script>
<script src="<?php echo base_url('asset/grafik/code/modules/exporting.js') ?>"></script>
<div class="row" style="margin-top: 14px; background-color: white;padding: 30px">
    <div class="col-md-12">
        <div>
            <div id="container" style="min-width: 600px; height: 600px; margin: 0 auto"></div>
            
            <script type="text/javascript">

                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'GRAFIK JUMLAH SPPD'
                    },
                    credits: {
                       enabled: false
                   },
                   subtitle: {
                    text: 'Source: Database '
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '10px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah (Orang)'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: 'Jumlah : <b>{point.y:.1f} Orang</b>'
                },

                series: [{
                    name: 'Population',
                    data: [<?php foreach ($fmgol as $datas): ?><?php echo '['."'".$datas->id_satuan_kerja."'".','.$this->Admin_m->jumlah_skpd($datas->id_satuan_kerja).'],'; ?><?php endforeach ?>],
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                    format: '{point.y:.1f}', // one decimal
                    y: 1, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    </script>
</div>
</div>
<!-- <div class="col-md-4">
    <table border="1" style="font-size: 12px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama SKPD</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fmgol as $data): ?>
                <tr>
                    <td class="text-center"><?php echo $data->id_satuan_kerja; ?></td>
                    <td><?php echo $data->nama_satuan_kerja; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div> -->
</div>