<body>
<div class="container-fluid" style="padding-left:0px">
    <div class="row">
        <div class="col-sm-3" >
            <div class="dark-bar" >
                <h2>You are god now</h2>
                Top level data <br>
                <a href="<?php echo site_url('admin/show_places');?>">Športy</a> <br>
                <a href="<?php echo site_url('admin/show_subplaces');?>">Športoviská</a> <br>
                <a href="<?php echo site_url('admin/show_payments');?>">Metódy platby</a> <br> <br>
                Lower data <br>
                <a href="<?php echo site_url('admin/show_invoices');?>">Faktúry</a> <br>
                <a href="<?php echo site_url('admin/show_entries');?>">Položky na faktúre</a> <br><br>
                Stats<br>
                <a href="<?php echo site_url('admin/chart_payment');?>">Forma platby</a><br>
                <a href="<?php echo site_url('admin/chart_sport');?>">Obľúbené športoviská</a><br>
                <a href="<?php echo site_url('admin/chart_income');?>">Príjmy</a><br>
                <a>chart 4</a><br>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="dash-content">

                <script type="text/javascript">
                    // Load the Visualization API and the corechart package.
                    google.charts.load('current', {'packages':['corechart']});
                    // Set a callback to run when the Google Visualization API is loaded.
                    google.charts.setOnLoadCallback(drawChart);
                    // Callback that creates and populates a data table,
                    // instantiates the pie chart, passes in the data and
                    // draws it.
                    function drawChart() {

                        // Create the data table.
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'mesiac');
                        data.addColumn('number', 'príjem');
                        data.addRows([
                            <?php foreach($query as $row) { ?>
                            ['<?php echo $row->mesiac ?>', <?php echo $row->suma ?>],
                            <?php } ?>
                        ]);

                        // Set chart options
                        var options = {'title':'Príjmy za jednotlivé mesiace',
                            'width':600,
                            'height':600};

                        // Instantiate and draw our chart, passing in some options.
                        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                        chart.draw(data, options);
                    }
                </script>

                <div id="chart_div"></div>

            </div>
        </div>
    </div>
</div>
</body>