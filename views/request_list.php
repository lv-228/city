<?php 

	$requests = $data['request'];
	$status   = $data['req_status'];
	$types    = $data['req_types'];;
	$status_mean = ['1' => 'Request created', '2' => 'Under consideration', '3' => 'Confirm', '4' => 'Rejected'];
	foreach ($types as $key => $value) {
        $types_arr[$value['id']] = $value['descript'];
    }
    //var_dump($types);
?>

<?php if(is_array($requests)): ?>
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th style="text-align: center;">Descript</th>
            <th class="uk-width-small" style="text-align: center;">Type</th>
            <th class="uk-width-small" style="text-align: center;">Status</th>
            <th class="uk-width-small" style="text-align: center;">See request</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requests as $key => $value): ?>
        <tr>
            <td><?= $value['descript'] ?></td>
            <td><?= $types_arr[$value['type']] ?></td>
            <td><?= $status_mean[$value['status']] ?></td>
            <td style="text-align: center;"><a href='index.php?page_controller=request&rid=<?= $value['id'] ?>' class="uk-button uk-button-primary">PAGE</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<h3>You have not created more than one request</h3>
<?php endif; ?>