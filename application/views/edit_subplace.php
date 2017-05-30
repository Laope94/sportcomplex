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
                <form action="<?php echo site_url('admin/commit_subplace');?>" method="post">
                    Športovisko:
                    <select name="sport_place">
                        <?php foreach($places as $row) { ?>
                            <option value="<?php echo $row->id ?>"
                                <?php if ($row->id == $query->id2) echo " selected " ?>>
                                <?php echo $row->name?>
                            </option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="id" value="<?php echo $query->id ?>">
                    Názov:
                    <input type="text" required name="subplace" value="<?php echo $query->sub_place ?>">
                    Cena/hodina:
                    <input type="number" required name="price" min="10" step="1" value="<?php echo $query->price ?>">
                    <input type="submit" name="potvrd" value="Potvrdiť úpravu">
                </form>
            </div>
        </div>
    </div>
</div>
</body>