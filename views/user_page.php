<?php
    $dtype = $data['doc_obj']->parse_query_result($data['doc_obj']->find_all());
    if(isset($_SESSION['uid']))
    {
        $u_docs = $data['doc_obj']->db_query('SELECT * FROM document WHERE owner = ' . $_SESSION['uid']);
        $usr = $data['user_obj']->find_by_id($_SESSION['uid']);
    }
    if(isset($usr) && is_array($usr))
    {
        $dtypeid = [];
        foreach ($dtype as $key => $value) {
            $dtypeid[$value['id']] = $value['descript'];
        }
    }
    //var_dump($dtypeid);
?>

<div class="uk-panel uk-margin-bottom">
    <img class="uk-border-rounded uk-align-center uk-align-right@m uk-margin-remove-adjacent uk-margin-right uk-margin-top"  src="img/girl.jpg" width="400" height="250" alt="Example image">
    <h1 class="uk-heading-line uk-text-center"><span>User info</span></h1>
	<ul class="uk-list uk-list-divider uk-width-1-2 uk-margin-left">
    	<li class="uk-margin-top ">Full name: <?= $usr[0]['first_name'] . ' ' . $usr[0]['second_name'] . ' ' . $usr[0]['last_name'] ?></li>
    	<li>Email: <?= $usr[0]['email'] ?></li>
    	<li>Login: <?= $usr[0]['login']  ?></li>
    	<li>Birth date: <?= $usr[0]['birth_date']  ?></li>
	</ul>
<form action="index.php?data_controller=add_u_doc" method="post" class="uk-margin-left">
<div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >S\N Document</h3></label>
    <div class="uk-form-controls uk-width-1-3">
        <input class="uk-input" id="form-horizontal-text" type="text" placeholder="S\N Document" name='numbers' required="">
    </div>
</div>

<div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-select"><h3 class="uk-heading-bullet" >Document type</h3></label>
    <div class="uk-form-controls uk-width-1-3">
        <select class="uk-select" id="form-horizontal-select" name='type'>
            <?php foreach ($dtype as $key => $value): ?>
                <option value="<?= $value['id'] ?>"><?= $value['descript'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Add document</h3></label>
    <div class="uk-form-controls uk-width-1-1">
        <button class="uk-button uk-button-primary" type='submit'>Add</button>
    </div>
</div>
</form>

<?php if(is_array($u_docs)): ?>
<div class="uk-accordion-content uk-overflow-auto uk-height-medium uk-width-1-3">
                        <table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>S/N Document</th>
            <th>Doc type</th>
            <th>Delete doc</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($u_docs as $key => $value): ?>
        <tr>
            <td><?= $value['numbers'] ?></td>
            <td><?= $dtypeid[$value['type']] ?></td>
            <td>
                <form action="index.php?data_controller=delete_u_doc" method="post">
                    <input type="hidden" name="did" value="<?= $value['id'] ?>">
                    <button class="uk-button uk-button-primary">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<?php else: ?>
<h3>You dont have documents!</h3>
<?php endif; ?>

	<h1 class="uk-heading-line uk-text-center"><span>Interaction with the city</span></h1>
	<ul class="uk-list uk-list-divider uk-width-1-2 uk-margin-left">
    	<li class="uk-margin-top" ><a class="uk-button uk-button-primary uk-width-medium" href='index.php?page_controller=user_fine'>View your penalties</a></li>
    	<li><a class="uk-button uk-button-primary uk-width-medium" href="index.php?page_controller=company_services">Buy company service</a></li>
    	<li><a class="uk-button uk-button-primary uk-width-medium" href="index.php?page_controller=create_request">Create a request to the city</a></li>
	</ul>
</div>