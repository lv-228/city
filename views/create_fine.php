<?php

    $ftype    = $data['f_type_obj']->parse_query_result($data['f_type_obj']->find_all());
    $companys = $data['company_obj']->parse_query_result($data['company_obj']->find_all());
    $flist    = $data['fine_obj']->parse_query_result($data['fine_obj']->find_all());
    foreach ($ftype as $key => $value) {
        $types_arr[$value['id']] = $value['descript'];
    }
    //var_dump($flist);die;
?>

<form style="text-align: center;" method="post" action="index.php?data_controller=create_fine">
        <fieldset class="uk-fieldset">

        <legend class="uk-legend">Create fine</legend>
<hr class="uk-divider-icon">
        <div class="uk-margin">
            <input class="uk-input uk-width-large" type="text" placeholder="S/N Document" required="" name="doc">
        </div>

        <div class="uk-margin">
            <input class="uk-input uk-width-large" type="text" placeholder="Price" required="" name="price">
        </div>

<!--         <div class="uk-margin">
            <label class="uk-form-label" for="type_select"><h3>Companys</h3></label>
            <div class="uk-form-controls">
            <select id='type_select' class="uk-select uk-width-large" name="type">
                <?php foreach ($companys as $key => $value): ?>
                <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div> -->

        <div class="uk-margin">
            <label class="uk-form-label" for="type_select"><h3>Type</h3></label>
            <div class="uk-form-controls">
            <select id='type_select' class="uk-select uk-width-large" name="type">
                <?php foreach ($ftype as $key => $value): ?>
                <option value="<?= $value['id'] ?>"><?= $value['descript'] ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>

        <div class="uk-margin">
            <textarea maxlength='255' class="uk-textarea uk-width-large" rows="5" placeholder="Describe the fine" style="max-height: 400px; max-width: 600px; min-width: 600px; min-height: 150px" name='des'></textarea>
        </div>

        <button class="uk-button uk-button-primary uk-input uk-width-1-4 uk-margin" >Primary</button>
    </fieldset>
</form>

<?php if(is_array($flist)): ?>
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th style="text-align: center;">Description</th>
            <th class="uk-width-small" style="text-align: center;">Document</th>
            <th class="uk-width-small" style="text-align: center;">Type</th>
            <th class="uk-width-medium">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($flist as $key => $value): ?>
        <tr>
            <td><?= $value['description'] ?></td>
            <td><?= $value['document'] ?></td>
            <td><?= $types_arr[$value['type']] ?></td>
            <td>
                <form action="index.php?data_controller=delete_fine" method="post">
                    <input type="hidden" name="fine_id" value="<?= $value['id'] ?>">
                    <button class="uk-button uk-button-primary">Delete fine</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<h3>No one fine</h3>
<?php endif; ?>