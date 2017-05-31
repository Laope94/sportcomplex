<body>
<div class="container-fluid" style="padding-left:0px ">
    <div class="row" >
        <div class="col-sm-3">
            <div class="dark-bar">
                <h2>You are god now</h2>
                Top level data <br>
                <a href="<?php echo site_url('admin/show_places');?>">Športy</a> <br>
                <a href="<?php echo site_url('admin/show_subplaces');?>">Športoviská</a> <br>
                <a href="<?php echo site_url('admin/show_payments');?>">Metódy platby</a> <br> <br>
                Lower data <br>
                <a href="<?php echo site_url('admin/show_invoices');?>">Faktúry</a> <br>
                <a href="<?php echo site_url('admin/show_entries');?>">Položky na faktúre</a> <br><br>
                Stats<br>
                <a>chart 1</a><br>
                <a>chart 2</a><br>
                <a>chart 3</a><br>
                <a>chart 4</a><br>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="dash-content">
                <form action="<?php echo site_url('admin/commit_entry'); ?>" method="post">
                    Športovisko:
                    <select name="sport_place">
                        <?php foreach($places as $row) {?>
                            <option value="<?php echo $row->id ?>"
                            <?php if($row->id==$query->sub_place){ echo " selected ";} ?> >
                                <?php echo $row->sport_place; echo " - "; echo $row->sub_place;?></option>
                        <?php } ?>
                    </select>
                    ID faktúry:
                    <select name="invoice_id">
                        <?php foreach($invoice as $row) {?>
                            <option value="<?php echo $row->id?>"
                                <?php if($row->id==$query->invoice){ echo " selected ";} ?> ><?php echo $row->id?></option>
                        <?php } ?>
                    </select>
                    <br><br>Začiatok: <input type="datetime-local" required name="start" value="<?php echo str_replace(" ", "T", $query->start) ?>">
                    Koniec: <input type="datetime-local" required name="end" value="<?php echo str_replace(" ", "T", $query->end) ?>">
                    <input type="hidden" name="id" value="<?php echo $query->id ?>">
                    <input type="submit" name="potvrd" value="Upraviť">
                </form>
        </div>
    </div>
</div>
</body>