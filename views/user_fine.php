<?php
    $fine = $data['fine'];
    if($data['fine'])
    {
        $result = [];
        for($i=0; $i < count($fine); $i++)
        {
            $result[$fine[$i]['document']][] = [$fine[$i]['description'], $fine[$i]['type'], $fine[$i]['price']];
        }
    }

    $ftype = $data['f_types'];
    $ftypeid = [];
    foreach ($ftype as $key => $value) {
        $ftypeid[$value['id']] = $value['descript'];
    }
?>
<?php if(isset($result)): ?>
<?php foreach($result as $key => $value): ?>
<h1 class="uk-heading-line uk-text-center"><span>Document: <?= $key ?></span></h1>

<table class="uk-table uk-table-middle uk-table-divider">
    <thead>
        <tr>
            <th class="uk-width-small">Fine type</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0; $i<count($value); $i++): ?>
        <tr>
            <td><?= $ftypeid[$value[$i][1]] ?></td>
            <td><?= $value[$i][0] ?></td>
            <th><?= $value[$i][2] ?></th>
        </tr>
        <?php endfor; ?>
    </tbody>
</table>
<?php endforeach; ?>
<?php else: ?>
<h3>You do not have an attached document with a penalty, you can add a document on your personal page!</h3>
<?php endif; ?>