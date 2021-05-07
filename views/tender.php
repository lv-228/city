<?php
    $tender = false;
    $tender       = $data['tenders'];
    $types        = $data['ten_types'];
    $participants = $data['bidders'];
    $ctypes       = $data['c_types'];
    foreach ($types as $key => $value)
    {
        $types_arr[$value['id']] = $value['description'];
    }
    foreach ($ctypes as $key => $value)
    {
        $ctypes_arr[$value['id']] = $value['descript'];
    }
?>
<?php if(is_array($tender)): ?>
<?php $part = $data['part']; ?>

<div class="uk-section uk-section-muted">
    <div class="uk-container">
        <h3>Name: <?= $tender[0]['name'] ?></h3>
<hr class="uk-divider-icon">
        <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
            <div>
                <h3>Type:</h3> <h4><?= $types_arr[$tender[0]['type']] ?></h4>
            </div>
            <div>
                <h3>Description:</h3> <h4><?= $tender[0]['description'] ?></h4>
            </div>
            <div>
                <h3>Participation in the tender:</h3> <h4><?= is_array($part) ? $tender[0]['winner'] == NULL ? '<span class="uk-label">Part</span>' : '<span class="uk-label uk-label-success">Winner announced</span>' : '<span class="uk-label uk-label-warning">You are not participating</span>'; ?></h4>
            </div>
        </div>

    </div>
</div>
<?php else: ?>
<h3 class="uk-margin-left">Tender not found!</h3>
<?php endif; ?>

<hr class="uk-divider-icon">
<form style="text-align: center;" method="post" action="index.php?data_controller=part_in_tender">
    <input type="hidden" name="tid" value="<?= $_GET['tid'] ?>">
        <fieldset class="uk-fieldset">
        <legend class="uk-legend">Enter your conditions for participation in the tender</legend>
<hr class="uk-divider-icon">

        <div class="uk-margin">
            <input class="uk-input uk-width-large" type="number" <?= !empty($part) ? 'placeholder=' . $part[0]['price'] . '$ disabled' : 'placeholder=Price' ?> name="price">
        </div>

            <!-- <input class="uk-range" type="range" value="2" min="0" max="10" step="0.1"> -->

        <div class="uk-margin">
            <textarea maxlength="255" <?= !empty($part) ? 'placeholder="' . (string)$part[0]['description'] . '" disabled' : 'placeholder=Describe the request' ?> name='description' class="uk-textarea uk-width-large" rows="5" style="max-height: 400px; max-width: 600px; min-width: 600px; min-height: 150px"></textarea>
        </div>

    </fieldset>
    <?php if(empty($part)): ?>
        <button class="uk-button uk-button-primary uk-input uk-width-1-4 uk-margin" type='submit'>Bidder</button>
    <?php endif; ?>
</form>

<h3 align="center">The participants</h3>

<hr class="uk-divider-icon">

<?php if(is_array($participants)): ?>
<table class="uk-table uk-table-hover uk-table-divider " style="max-width: 1000px;" align="center">
    <thead>
        <tr>
            <th>Type</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Company page</th>
            <th>Declare the winner</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($participants as $key => $value): ?>
        <?php $participant = $data['company_obj']->get_by_id($value['company_id']);
              $p           = $data['company_obj']->db_query('SELECT * FROM bidders WHERE company_id = ' . $value['company_id'] . ' AND tender_id = ' . $_GET['tid']);
         ?>
        <tr>
            <td><?= $ctypes_arr[$participant[0]['type']] ?></td>
            <td><?= $participant[0]['name'] ?></td>
            <td><?= $p[0]['price'] ?></td>
            <td><?= $p[0]['description'] ?></td>
            <td><a href='index.php?page_controller=company_page&cid=<?= $participant[0]['id'] ?>' class="uk-button uk-button-primary">Company page</a></td>
            <td>
                <?php if($tender[0]['winner'] === NULL && (isset($_SESSION['role']) && (in_array(1, array_column($_SESSION['role'], 'id')) || in_array(3, array_column($_SESSION['role'], 'id'))))): ?>
                <form method="post" action="index.php?data_controller=declare_winner">
                    <input type="hidden" name="cid" value="<?= $p[0]['company_id'] ?>">    
                    <input type="hidden" name="tid" value="<?= $_GET['tid'] ?>">
                    <button class="uk-button uk-button-primary" type="submit">Declare</button>
                </form>
                <?php else: ?>
                <h3><?php if($p[0]['company_id'] === $tender[0]['winner']) echo 'Winner!'; else echo 'Not winner'; ?></h3>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<h3 class="uk-margin-left">Nobody announced their participation in the tender</h3>
<?php endif; ?>