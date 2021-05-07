<?php 
	$news = $data['news_obj']->parse_query_result($data['news_obj']->find_all());
?>

<?php if(is_array($news)): ?>
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th style="text-align: center;">Name</th>
            <th class="uk-width-small" style="text-align: center;">Date</th>
            <th class="uk-width-small" style="text-align: center;">Delete</th>
            <th class="uk-width-small" style="text-align: center;">News page</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($news as $key => $value): ?>
        <tr>
            <td><?= $value['heading'] ?></td>
            <td><?= $value['public_date'] ?></td>
            <td style="text-align: center;">
                <form action="index.php?data_controller=delete_news" method="post">
                    <input type="hidden" name="nid" value="<?= $value['id'] ?>">
                    <button class="uk-button uk-button-danger" type="submit">DELETE</button>
                </form>
            </td>
            <td><a class="uk-button uk-button-primary" href='index.php?page_controller=news&nid=<?= $value['id'] ?>'>See news</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<h3>No one user</h3>
<?php endif; ?>