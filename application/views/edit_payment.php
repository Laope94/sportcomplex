<body>
<div class="container-fluid" style="padding-left:0px ">
    <div class="row" >
        <div class="col-sm-3">
            <div class="dark-bar">
                <h2>You are god now</h2>
                Top level data <br>
                <a href="<?php echo site_url('admin/show_places');?>">Športy</a> <br>
                <a href="<?php echo site_url('admin/dash_subplace');?>">Športoviská</a> <br>
                <a>Metódy platby</a> <br> <br>
                Lower data <br>
                <a>Faktúry</a> <br>
                <a>Položky na faktúre</a> <br>
                <a>Tabuľka adminov</a> <br>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="dash-content">
                <form action="<?php echo site_url('admin/commit_payment');?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $query->id ?>">
                    Metóda platby
                    <input type="text" required name="method" value="<?php echo $query->type ?>">
                    <input type="submit" name="potvrd" value="Potvrdiť úpravu">
                </form>
            </div>
        </div>
    </div>
</div>
</body>