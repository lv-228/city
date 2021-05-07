<form style="text-align: center;" method="get" action="">
    <input class="uk-input uk-width-large" type="hidden" placeholder="Name" name='page_controller' value="company_list">
        <fieldset class="uk-fieldset">

        <legend class="uk-legend">Find compani</legend>
<hr class="uk-divider-icon">
        <div class="uk-margin">
            <input class="uk-input uk-width-large" type="text" placeholder="Name" name='name'>
        </div>

        <div class="uk-margin">
            <button type="submit" class="uk-button uk-button-primary">FIND</button>
        </div>

    </fieldset>
</form>
<h3 align="center">Company list</h3>
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>Name</th>
            <th>Legal address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Page</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['companys'] as $key => $value): ?>
        <tr>
            <td><?= $value['name'] ?></td>
            <td><?= $value['legal_address'] ?></td>
            <td><?= $value['phone'] ?></td>
            <td><?= $value['email'] ?></td>
            <td><a href='index.php?page_controller=company_page&cid=<?= $value['id'] ?>' class="uk-button uk-button-primary">See page</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>