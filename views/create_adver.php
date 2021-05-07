<?php
    $adver_list = $data['baner_obj']->parse_query_result($data['baner_obj']->find_all());
?>
<form style="text-align: center;" method="post" action="index.php?data_controller=create_adver" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="999999">

        <fieldset class="uk-fieldset">

        <legend class="uk-legend">Create advertising</legend>
<hr class="uk-divider-icon">
        <div>
            <label>Start date:</label>
            <input name='start_date' class="uk-input uk-width-large" type="date" placeholder="Name" min='<?= $date ?>'>
        </div>
        <br>
        <div>
            <label>End date:</label>
            <input name='end_date' class="uk-input uk-width-large" type="date" placeholder="Name" min='<?= $date ?>'>
        </div>

        <div class="uk-margin">
            <textarea name='text' class="uk-textarea uk-width-large" rows="5" placeholder="Adver text" style="max-height: 400px; max-width: 600px; min-width: 600px; min-height: 150px"></textarea>
        </div>

        <div class="uk-margin" uk-margin>
        <div uk-form-custom="target: true">
            <input type="file" name='img' value="" accept="image/jpeg,image/png, image/jpg">
            <input class="uk-input" type="text" placeholder="Select file" disabled style="width: 1000px">
        </div>
    </div>

    </fieldset>

    <button class="uk-button uk-button-primary uk-input uk-width-1-4 uk-margin" type='submit'>Create</button>
</form>


<?php if(is_array($adver_list)): ?>
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th style="text-align: center;">Text</th>
            <th class="uk-width-small" style="text-align: center;">User</th>
            <th class="uk-width-small" style="text-align: center;">SDate</th>
            <th class="uk-width-small" style="text-align: center;">EDate</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($adver_list as $key => $value): ?>
        <tr>
            <td><?= $value['adver_text'] ?></td>
            <td><?= $value['owner'] ?></td>
            <td><?= $value['start_date'] ?></td>
            <td><?= $value['end_date'] ?></td>
            <td style="text-align: center;">
                <form action="index.php?data_controller=delete_adver" method="post">
                    <input type="hidden" name="bid" value="<?= $value['id'] ?>">
                    <button class="uk-button uk-button-danger" type="submit">DELETE</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<h3>No one baner</h3>
<?php endif; ?>