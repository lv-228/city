<?php
    if(empty($data['request']))
    {
        echo "Request not found";
        return;
    }
	$status_mean = ['1' => 'Request created', '2' => 'Under consideration', '3' => 'Confirm', '4' => 'Rejected'];

    foreach ($data['req_types'] as $key => $value) 
    {
        $types_arr[$value['id']] = $value['descript'];
    }

    $owner = false;

    if((isset($_SESSION['type']) && $_SESSION['type'] == 'user' && $data['request'][0]['owner_u'] == $_SESSION['uid']) || (isset($_SESSION['type']) && $_SESSION['type'] == 'company' && $data['request'][0]['owner_c'] == $_SESSION['uid']))
        $owner = true;

    if($owner == false && !(isset($_SESSION['role']) && (in_array(1, array_column($_SESSION['role'], 'id')) || in_array(3, array_column($_SESSION['role'], 'id')))))
    {
        echo "Forbidden";
        return;
    }
?>

<div class="uk-margin uk-margin-left">
	<h3>Description:<br><hr class="uk-divider-small"> <?= $data['request'][0]['descript'] ?><hr class="uk-divider-small"></h3>
	<h3>Type:<br><hr class="uk-divider-small"> <?= $types_arr[$data['request'][0]['type']] ?><hr class="uk-divider-small"></h3>
	<h3>Status:<br><hr class="uk-divider-small"> <?= $status_mean[$data['request'][0]['status']] ?><hr class="uk-divider-small"></h3>
	<h3>Answer:<br><hr class="uk-divider-small"> <?= $data['request'][0]['answer'] == NULL ? 'Not answered' : $data['request'][0]['answer'] ?><hr class="uk-divider-small"></h3>
<?php if(isset($_SESSION['role']) && (in_array(1, array_column($_SESSION['role'], 'id')) || in_array(3, array_column($_SESSION['role'], 'id')))): ?>
	<form style="text-align: center;" method="post" action="index.php?data_controller=answer_request">
    <input type="hidden" name="rid" value="<?= $_GET['rid'] ?>">

        <fieldset class="uk-fieldset">
        <legend class="uk-legend">Can you answer</legend>
<hr class="uk-divider-icon">
        <div class="uk-margin">
            <label class="uk-form-label" for="type_select"><h3>Status</h3></label>
            <div class="uk-form-controls">
            <select id='type_select' class="uk-select uk-width-large" name="status">
            <?php foreach ($status_mean as $key => $value): ?>
                <option <?= $data['request'][0]['status'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
            <?php endforeach; ?>
            </select>
            </div>
        </div>

        <div class="uk-margin">
            <textarea name='answer' class="uk-textarea uk-width-large" rows="5" placeholder="Answer" style="max-height: 400px; max-width: 600px; min-width: 600px; min-height: 150px"></textarea>
        </div>
    </fieldset>

    <button class="uk-button uk-button-primary uk-input uk-width-1-4 uk-margin" type='submit'>Answer</button>
</form>
<?php endif; ?>
</div>