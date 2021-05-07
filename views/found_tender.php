<?php
	if(!is_array($data['tenders']))
	{
		echo '<h3 class="uk-margin-left">Tender not found!</h3>';
		return;
	}
    $types = $data['ten_type_obj']->parse_query_result($data['ten_type_obj']->find_all());
    foreach ($types as $key => $value)
    {
        $types_arr[$value['id']] = $value['description'];
    }
?>

<?php if(is_array($data['tenders'])): ?>
	<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>Type</th>
            <th>Name</th>
            <th>Winner</th>
            <th>Tender page</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['tenders'] as $key => $value): ?>
        <tr>
            <td><?= $types_arr[$value['type']] ?></td>
            <td><?= $value['name'] ?></td>
            <td><?= $value['winner'] === NULL ? 'No winner has been determined' : 'Announced'; ?></td>
            <td><a href='index.php?ipage=tender&tid=<?= $value['id'] ?>' class="uk-button uk-button-primary">Page</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>