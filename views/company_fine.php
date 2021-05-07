<?php
        if(isset($_GET['cid']))
        {
            $complaint = $data['complaint_obj']->db_query('SELECT * FROM complaint WHERE to_c = ' . $_GET['cid']);
            $company = $data['company_obj']->get_by_id($_GET['cid']);
        }
        else
        {
            $complaint = $data['complaint_obj']->db_query('SELECT * FROM complaint WHERE to_c = ' . $_SESSION['uid']);;
            $company = $data['company_obj']->get_by_id($_SESSION['uid']);
        }
        $types = $data['complaint_type_obj']->find_all();
        $types_array = [];
        foreach ($types as $key => $value)
        {
            $types_array[$value['id']] = $value['descript'];
        }
?>

<h1 class="uk-heading-line uk-text-center"><span><?= $company[0]['name'] ?></span></h1>
<?php if(is_array($complaint)): ?>
<table class="uk-table uk-table-middle uk-table-divider">
    <thead>
        <tr>
            <th class="uk-width-small">Complaint type</th>
            <th>About</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($complaint as $key => $value): ?>
        <tr>
            <td><?= $types_array[$value['type']] ?></td>
            <td><?= $value['body'] ?></td>
            <?php if(isset($_SESSION['role']) && (in_array(1, array_column($_SESSION['role'], 'id')) || in_array(3, array_column($_SESSION['role'], 'id')))): ?>
            <td>
                <form method="post" action="index.php?data_controller=delete_complaint">
                    <input type="hidden" name="cid" value="<?= $value['id'] ?>">
                    <input type="submit" name="complaint" value="delete" class="uk-button uk-button-danger">
                </form>
            </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<h3>There are no complaints about your company</h3>
<?php endif; ?>