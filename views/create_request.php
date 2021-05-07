<?php

    $types        = $data['req_type_obj']->parse_query_result($data['req_type_obj']->find_all());
    $req_query    = $_SESSION['type'] == 'company' ? 'SELECT * FROM requests WHERE owner_c = ' : 'SELECT * FROM requests WHERE owner_u = ' ;
    $your_request = $data['req_type_obj']->db_query($req_query . $_SESSION['uid']);
    $types_arr = [];
    //var_dump($your_request);
    foreach ($types as $key => $value) {
        $types_arr[$value['id']] = $value['descript'];
    }
    $status_mean = ['1' => 'Request created', '2' => 'Under consideration', '3' => 'Confirm', '4' => 'Rejected'];
    //var_dump($your_request);
?>

<form style="text-align: center;" method="post" action="index.php?data_controller=create_request">
    <input type="hidden" name="from" value="<?= $_SESSION['type'] ?>">
    <input type="hidden" name="usr" value="<?= $_SESSION['uid'] ?>">
        <fieldset class="uk-fieldset">

        <legend class="uk-legend">Create request</legend>
<hr class="uk-divider-icon">
        <div class="uk-margin">
            <label class="uk-form-label" for="type_select"><h3>Type</h3></label>
            <div class="uk-form-controls">
            <select id='type_select' class="uk-select uk-width-large" name="type">
            <?php foreach ($types as $key => $value): ?>
                <option value="<?= $value['id'] ?>"><?= $value['descript'] ?></option>
            <?php endforeach; ?>
            </select>
            </div>
        </div>

        <div class="uk-margin">
            <textarea name='desc' class="uk-textarea uk-width-large" rows="5" placeholder="Describe the request" style="max-height: 400px; max-width: 600px; min-width: 600px; min-height: 150px"></textarea>
        </div>
    </fieldset>

    <button class="uk-button uk-button-primary uk-input uk-width-1-4 uk-margin" type='submit'>Create</button>
</form>

<?php if(is_array($your_request)): ?>
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th style="text-align: center;">Descript</th>
            <th class="uk-width-small" style="text-align: center;">Type</th>
            <th class="uk-width-small" style="text-align: center;">Status</th>
            <th class="uk-width-small" style="text-align: center;">See request</th>
            <th class="uk-width-small" style="text-align: center;">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($your_request as $key => $value): ?>
        <tr>
            <td><?= $value['descript'] ?></td>
            <td><?= $types_arr[$value['type']] ?></td>
            <td><?= $status_mean[$value['status']] ?></td>
            <td style="text-align: center;"><a href='index.php?page_controller=request&rid=<?= $value['id'] ?>' class="uk-button uk-button-primary">PAGE</a></td>
            <td>
                <form action="index.php?data_controller=delete_request" method="post">
                    <input type="hidden" name="req_id" value="<?= $value['id'] ?>">
                    <button class="uk-button uk-button-danger" type="submit">DELETE</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<h3>You have not created more than one request</h3>
<?php endif; ?>