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
                <form action="<?php echo site_url('admin/commit_invoice'); ?>" method="post">
                    Meno: <input type="text" required name="name" value="<?php echo $query->name ?>">
                    Priezvisko: <input type="text" required name="surname" value="<?php echo $query->surname ?>">
                    <br><br>Email: <input type="text" required name="email" value="<?php echo $query->email ?>" >
                    Telefónne číslo: <input type="text" required name="phone" value="<?php echo $query->phone_number ?>">
                    Dátum vytvorenia: <input type="datetime-local" required name="created" step="1" value="<?php echo str_replace(" ", "T", $query->creation_date) ?>">
                    <br><br>Suma: <input type="number" required min="0" name="amount" value="<?php echo $query->amount ?>">
                    Forma platby: <select name="payment">
                        <?php foreach($payments as $row) {?>
                            <option value="<?php echo $row->id ?>" <?php if($row->id==$query->payment_form) { echo " selected "; } ?>>
                                <?php echo $row->type?></option>
                        <?php } ?>
                    </select>
                    Uzavreté:
                    <select name="closed">
                        <option value="0" <?php if(0==$query->is_closed) { echo " selected "; } ?>>0</option>
                        <option value="1" <?php if(1==$query->is_closed) { echo " selected "; } ?>>1</option>
                    </select>
                    Zaplatené:
                    <select name="paid">
                        <option value="0" <?php if(0==$query->is_paid) { echo " selected "; } ?>>0</option>
                        <option value="1" <?php if(1==$query->is_paid) { echo " selected "; } ?>>1</option>
                    </select>
                    <input type="hidden" name="id" value="<?php echo $query->id ?>">
                    <input type="submit" name="potvrd" value="Upraviť">
                </form>
            </div>
        </div>
    </div>
</body>