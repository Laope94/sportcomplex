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
                <a>chart 1</a><br>
                <a>chart 2</a><br>
                <a>chart 3</a><br>
                <a>chart 4</a><br>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="dash-content">
                <form action="<?php echo site_url('admin/invoice_add');?>" method="post">
                    Meno: <input type="text" required name="name">
                    Priezvisko: <input type="text" required name="surname">
                    <br><br>Email: <input type="text" required name="email">
                    Telefónne číslo: <input type="text" required name="phone">
                    Dátum vytvorenia: <input type="datetime-local" required name="created">
                    <br><br>Suma: <input type="number" required min="0" name="amount">
                    Forma platby: <select name="payment">
                        <?php foreach($payments as $row) {?>
                            <option value="<?php echo $row->id ?>">
                                <?php echo $row->type?></option>
                        <?php } ?>
                    </select>
                    Uzavreté:
                    <select name="closed">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                    Zaplatené:
                    <select name="paid">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                    <input type="submit" name="potvrd" value = "Pridať">
                </form>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>meno</th>
                        <th>priezvisko</th>
                        <th>email</th>
                        <th>telefón</th>
                        <th>dátum vytvorenia</th>
                        <th>suma</th>
                        <th>forma platby</th>
                        <th>uzavreté</th>
                        <th>zaplatené</th>
                        <th>akcia</th>
                    </tr>
                    <?php foreach($query as $row) { ?>
                        <tr>
                            <td><?php echo $row->id ?> </td>
                            <td><?php echo $row->name ?> </td>
                            <td><?php echo $row->surname ?> </td>
                            <td><?php echo $row->email ?> </td>
                            <td><?php echo $row->phone_number ?> </td>
                            <td><?php echo $row->creation_date ?> </td>
                            <td><?php echo $row->amount ?> </td>
                            <td><?php echo $row->type ?> </td>
                            <td><?php echo $row->is_closed ?> </td>
                            <td><?php echo $row->is_paid ?> </td>
                            <td>
                                <form action="<?php echo site_url('admin/invoice_edit');?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                    <input type="submit" name="potvrd" value="Upravit">
                                </form>
                                <form action="<?php echo site_url('admin/invoice_delete');?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                    <input type="submit" name="potvrd" value="Zmazať">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>