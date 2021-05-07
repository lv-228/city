<?php

    $types   = $data['ten_type_obj']->parse_query_result($data['ten_type_obj']->find_all());
    $tenders = $data['tender_obj']->parse_query_result($data['tender_obj']->find_all());

    foreach ($types as $key => $value) {
        $types_arr[$value['id']] = $value['description'];
    }
?>

<form style="text-align: center;" method="post" action="index.php?data_controller=create_tender">
        <fieldset class="uk-fieldset">

        <legend class="uk-legend">Create tender</legend>
<hr class="uk-divider-icon">
        <div class="uk-margin">
            <input class="uk-input uk-width-large" type="text" placeholder="Name" name='name'>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="type_select"><h3>Type</h3></label>
            <div class="uk-form-controls">
            <select id='type_select' class="uk-select uk-width-large" name='ttype'>
                <?php foreach ($types as $key => $value): ?>
                <option value="<?= $value['id'] ?>"><?= $value['description'] ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>

        <div class="uk-margin">
            <textarea maxlength="255" name='description' class="uk-textarea uk-width-large" rows="5" placeholder="Describe the tender" style="max-height: 400px; max-width: 600px; min-width: 600px; min-height: 150px"></textarea>
        </div>

        <button class="uk-button uk-button-primary uk-input uk-width-1-4 uk-margin-bottom" type="submit">Primary</button>
    </fieldset>
</form>

<?php if(is_array($tenders)): ?>
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Description</th>
            <th>Tender page</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tenders as $key => $value): ?>
        <tr>
            <td><?= $value['name'] ?></td>
            <td><?= $types_arr[$value['type']] ?></td>
            <td><?= $value['description'] ?></td>
            <td><a href='index.php?ipage=tender&tid=<?= $value[0] ?>' class="uk-button uk-button-primary">Page</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<h3>You have not created more than one request</h3>
<?php endif; ?>