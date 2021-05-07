<?php
    if(isset($_SESSION['uid']))
    {
        $company = $data['company_obj']->get_by_id($_SESSION['uid']);
    }
    elseif(isset($_GET['cid']))
    {
        $company = $data['company_obj']->get_by_id($_GET['cid']);
    }

    $cworkers = $data['worker_obj']->db_query('SELECT * FROM worker WHERE company = ' . $_SESSION['uid']);
    $dtypes   = $data['doc_type_obj']->parse_query_result($data['doc_type_obj']->find_all());
    $cdocs    = $data['company_doc_obj']->db_query('SELECT * FROM company_document WHERE company = ' . $_SESSION['uid']);

    foreach ($dtypes as $key => $value)
    {
        $dtypeid[$value['id']] = $value['descript'];
    }
?>
<?php if(isset($company) && is_array($company)): ?>
<div class="uk-panel uk-margin-bottom">
    <div class="uk-border-rounded uk-align-center uk-align-right@m uk-margin-remove-adjacent uk-margin-right uk-margin-top">
    <img class="uk-border-rounded uk-align-center uk-align-right@m uk-margin-remove-adjacent uk-margin-right uk-margin-top"  src="<?= preg_replace('/\s+/', '','./views/img/' . basename($company[0]['img'])) ?>" width="400" height="250" alt="Example image">
    <form class="uk-margin-top" style="text-align: center" action="index.php?data_controller=add_c_img" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cid" value="<?= $_SESSION['uid'] ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="999999">
        <div class="uk-margin" uk-margin>
        <div uk-form-custom="target: true">
            <input type="file" name='img' value="" accept="image/jpeg,image/png, image/jpg">
            <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
        </div>
        <button class="uk-button uk-button-default" type="submit">Download</button>
    </div>
    </form>
    </div>
    <h1 class="uk-heading-line uk-text-center"><span>Compani info</span></h1>
	<ul class="uk-list uk-list-divider uk-width-1-2 uk-margin-left">
    	<li class="uk-margin-top ">Name: <?= $company[0]['name'] ?></li>
    	<li>Email: <?= $company[0]['email'] ?></li>
    	<li>Login: <?= $company[0]['login'] ?></li>
    	<li>Legal address: <?= $company[0]['legal_address'] ?></li>
        <li>Physical address <?= $company[0]['physical_address'] ?></li>
        <li>
            <ul uk-accordion="multiple: true">
                <li class="uk-open">
                    <a class="uk-accordion-title" href="#">Staff list:</a>
                    <div class="uk-accordion-content uk-overflow-auto uk-height-medium">
                        <?php if(is_array($cworkers)): ?>
                        <table class="uk-table uk-table-hover uk-table-divider">
                            <thead>
                                <tr>
                                    <th>Full name</th>
                                    <th>Car reg</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($cworkers as $key => $value): ?>
                            <tr>
                                <td><?= $value['full_name'] ?></td>
                                <td><?= $value['auto_reg'] ?></td>
                                <td><?= $value['position'] ?></td>
                                <td><?= $value['email'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                            <h3>No employees added to the company</h3>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </li>
	</ul>
<?php if(isset($_SESSION['type']) && $_SESSION['type'] == 'company'): ?>
    <div class="uk-margin-left">
    <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Add staff</h3></label>
    <div class="uk-form-controls uk-width-1-1">
        <a class="uk-button uk-button-primary" href="#modal-overflow" uk-toggle>Add</a>
    </div>
</div>
    <h1 class="uk-heading-line uk-text-center"><span>Documents</span></h1>
<form action="index.php?data_controller=add_c_doc" method="post" class="uk-margin-left">
<div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >S\N Document</h3></label>
    <div class="uk-form-controls uk-width-1-3">
        <input class="uk-input" id="form-horizontal-text" type="text" placeholder="S\N Document" name='number' required="">
    </div>
</div>

<div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-select"><h3 class="uk-heading-bullet" >Document type</h3></label>
    <div class="uk-form-controls uk-width-1-3">
        <select class="uk-select" id="form-horizontal-select" name='type'>
            <?php foreach ($dtypes as $key => $value): ?>
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
<?php endif; ?>

<?php if(is_array($cdocs)): ?>
<h3 class="uk-margin-left">Documents:</h3>
<div class="uk-accordion-content uk-overflow-auto uk-height-medium uk-width-1-3">
                        <table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>S/N Document</th>
            <th>Doc type</th>
            <th>See fine</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cdocs as $key => $value): ?>
        <tr>
            <td><?= $value['nubmers'] ?></td>
            <td><?= $dtypeid[$value['type']] ?></td>
            <td>
                <form action="index.php?data_controller=delete_c_doc" method="post">
                    <input type="hidden" name="cdid" value="<?= $value['id'] ?>">
                    <?php if(isset($_SESSION['type']) && $_SESSION['type'] == 'company'): ?><button class="uk-button uk-button-danger">DELETE</button><?php endif; ?>
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
    <div class="uk-flex uk-flex-center">
    <div>
	<ul class="uk-list uk-list-divider uk-margin-left">
    	<li class="uk-margin-top" ><a class="uk-button uk-button-primary uk-width-medium" href='index.php?page_controller=company_fine&cid=<?= $company[0]['id'] ?>'>View your penalties</a></li>
        <?php if(isset($_SESSION['type']) && $_SESSION['type'] == 'company'): ?>
    	   <li><a class="uk-button uk-button-primary uk-width-medium" href='index.php?page_controller=tender_list'>Participate in tenders</a></li>
            <li><a class="uk-button uk-button-primary uk-width-medium" href='index.php?page_controller=create_request'>Create a request to the city</a></li>
        <?php endif; ?>
	</ul>
    </div>
    <?php if(isset($_SESSION['roles']) && in_array(ADMIN, $_SESSION['roles'])): ?>
    <div>
    <ul class="uk-list uk-list-divider uk-margin-left">
        <li class="uk-margin-top" ><a class="uk-button uk-button-danger uk-width-medium" href='index.php?ipage=create_complaint&cid=<?= $company[0][0] ?>'>Create complaint</a></li>
    </ul>
    </div>
    <?php endif; ?>
    </div>
</div>

<div id="modal-overflow" uk-modal>
    <div class="uk-modal-dialog">
        <form action="index.php?data_controller=add_staff" method="post">
        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Headline</h2>
        </div>

        <div class="uk-modal-body" uk-overflow-auto>

            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Full name</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Full name" name='full_name'>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Car reg</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Car reg" name='auto_reg'>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Position</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Position" name='position'>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Email" name='email'>
                </div>
            </div>
        </div>

        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="submit">Save</button>
        </div>
        </form>
    </div>
</div>
<?php else: ?>
<h3>Company not found!</h3>
<?php endif ?>