<?php
    $companys = $data['company_obj']->parse_query_result($data['company_obj']->find_all());
    $types    = $data['complaint_type_obj']->parse_query_result($data['complaint_type_obj']->find_all());
?>

<form style="text-align: center;" method="post" action="index.php?data_controller=create_complaint">
    <input type="hidden" name="usr" value="<?= $_SESSION['uid'] ?>">
        <fieldset class="uk-fieldset">

        <legend class="uk-legend">Create complaint</legend>
<hr class="uk-divider-icon">
        <div class="uk-margin">
            <label class="uk-form-label" for="type_select"><h3>Company</h3></label>
            <div class="uk-form-controls">
            <select id='type_select' class="uk-select uk-width-large" name="company">
                <?php foreach ($companys as $key => $value): ?>
                <option <?= (isset($_GET['cid']) && $_GET['cid'] == $value['id']) ? 'selected' : '' ?> value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>

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
            <textarea maxlength='255' class="uk-textarea uk-width-large" rows="5" placeholder="Describe the fine" style="max-height: 400px; max-width: 600px; min-width: 600px; min-height: 150px" name='des'></textarea>
        </div>

        <button class="uk-button uk-button-primary uk-input uk-width-1-4 uk-margin" type='submit'>Create</button>
    </fieldset>
</form>