<?php 
	$users = $data['users'];
?>

<?php if(!empty($users)): ?>
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th style="text-align: center;">Login</th>
            <th class="uk-width-small" style="text-align: center;">E-mail</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $key => $value): ?>
        <tr>
            <td><?= $value['login'] ?></td>
            <td><?= $value['email'] ?></td>
            <td style="text-align: center;">
                <form action="index.php?data_controller=delete_user" method="post">
                    <input type="hidden" name="user_id" value="<?= $value['id'] ?>">
                    <button class="uk-button uk-button-danger" type="submit">DELETE</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<h3>No one baner</h3>
<?php endif; ?>