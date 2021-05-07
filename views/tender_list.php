<?php 

    $tenders = $data['tender_obj']->parse_query_result($data['tender_obj']->find_all());
    $types   = $data['ten_type_obj']->parse_query_result($data['ten_type_obj']->find_all());
    foreach ($types as $key => $value)
    {
        $ttypes_array[$value['id']] = $value['description'];
    }
?>
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
        <?php foreach ($tenders as $key => $value): ?>
        <tr>
            <td><?= $ttypes_array[$value['type']] ?></td>
            <td><?= $value['name'] ?></td>
            <td><?= $value['winner'] === NULL ? 'No winner has been determined' : 'Announced'; ?></td>
            <td><a href='index.php?page_controller=tender&tid=<?= $value['id'] ?>' class="uk-button uk-button-primary">Page</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>