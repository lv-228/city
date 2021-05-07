<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/user.php';

    $cards   = $data['discount_obj']->db_query('SELECT * FROM discount_card');
    $card    = $data['discount_obj']->db_query('SELECT * FROM discount_card WHERE owner = ' . $_SESSION['uid']);
    $tickets = $data['discount_obj']->db_query('SELECT * FROM owner_service WHERE user = ' . $_SESSION['uid']);
    $types   = $data['discount_obj']->db_query('SELECT * FROM service_type');

    foreach ($types as $key => $value) {
        $types_arr[$value['id']] = $value['descript'];
    }
?>
<div class="uk-section-default">
    <div class="uk-section uk-light uk-background-cover uk-height-large"style="background-image: url(views/img/apark2.jpg);">
        <div class="uk-container">

            <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                <div>
<!--                     <h2 class="uk-card-title">Hello!</h2>
                    <h3 style="opacity: 1">Welcome to the page of our amusement park!On this page you can: buy a ticket, add a loyalty card, and see the schedule and the latest news of our park</h3> -->
                </div>
                <div class="uk-card uk-card-secondary uk-card-body" style="opacity: 0.8">
                    <h2 class="uk-card-title">Hello!</h2>
                    <h3 style="opacity: 1">Welcome to the page of our amusement park!On this page you can: buy a ticket, add a loyalty card, and see the schedule and the latest news of our park</h3>
                </div>
                <div>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p> -->
                </div>
            </div>

        </div>
    </div>
</div>

<div class="uk-section uk-light uk-background-cover" style="background-image: url(views/img/today.jpg)">
</div>

<div class="uk-section-default">
    <div class="uk-section uk-light uk-background-center-center uk-height-large" uk-parallax="bgy: -800" style="background-image: url(views/img/aparkticket1.jpg);">
        <div class="uk-container">

            <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                <div class="uk-card uk-card-secondary uk-card-body" style="opacity: 0.8">
                    <h2 class="uk-card-title">Buying a ticket</h2>
                    <!-- <h3 style="opacity: 1">Welcome to the page of our amusement park!On this page you can: buy a ticket, add a loyalty card, and see the schedule and the latest news of our park</h3> -->
                </div>
                <div class="uk-card uk-card-secondary uk-card-body" style="opacity: 0.8">
                    <h2 class="uk-card-title">Select the number of tickets</h2>
                    <form action="server_script/service_logic.php" method="post">
                        <input type="hidden" name="ticket" value="buy">
                        <input class="uk-width-1-1" type='number' name="ctickets" style='color: black;font-size: 30px;' placeholder="Children's tickets" min='1' max='30'>
                        <hr class="uk-divider-icon">
                        <input class="uk-width-1-1" type='number' name="atickets" style='color: black;font-size: 30px;' placeholder="Adult tickets" min='1' max='30'>
                        <button class="uk-button uk-button-primary uk-button-medium uk-width-1-2 uk-margin-top" style="margin-left: 25%;">Buy</button>
                    </form>
                </div>
                <div class="uk-card uk-card-secondary uk-card-body" style="opacity: 0.8">
                    <?php if(!$card): ?>
                    <h2 class="uk-card-title">Do you have a discount card? Please enter her number</h2>
                    <form action="index.php?data_controller=bind_card" method="post">
                        <input class="uk-width-1-1" type='number' name="number" style='color: black;font-size: 30px;' placeholder="Card number" min='1111111111' max='9999999999' required="">
                        <button class="uk-button uk-button-primary uk-button-medium uk-width-1-2 uk-margin-top" style="margin-left: 25%;">Save</button>
                    </form>
                    <?php else: ?>
                        <h3>Your card number: <?= $card[0]['serial_number'] ?></h3>
                    <?php endif; ?>
                    <p>(The discount will return in the form of cashback)</p>
                </div>
            </div>

        </div>
    </div>
</div>

<?php if(is_array($tickets)): ?>
<div class="uk-section uk-light uk-background-cover" style="background-image: url(views/img/today.jpg)">
</div>

<div class="uk-section-default uk-height-large">
    <div class="uk-section uk-light uk-background-center-center uk-height-large" uk-parallax="bgy: -800" style="background-image: url(views/img/aparkticket1.jpg);">
        <div class="uk-container">

            <div class="uk-grid-match uk-child-width-1-2" uk-grid>
                <div class="uk-card uk-card-secondary uk-card-body" style="opacity: 0.8">
                    <h2 class="uk-card-title">Your tickets</h2>
                    <!-- <h3 style="opacity: 1">Welcome to the page of our amusement park!On this page you can: buy a ticket, add a loyalty card, and see the schedule and the latest news of our park</h3> -->
                </div>
                <div class="uk-card uk-card-secondary uk-card-body uk-accordion-content uk-overflow-auto" style="opacity: 0.8;max-height: 350px;">
                    <table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr style="text-align: center;">
            <th>Ticket type</th>
            <th>Ticket until</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tickets as $key => $value): ?>
        <tr>
            <td align="center"><?= $types_arr[$value['service_id']] ?></td>
            <td align="center"><?= $value['relese_date'] ?></td>
            <td align="center">
                <form action="index.php?data_controller=delete_a_ticket" method="post">
                    <input type="hidden" name="ticket_id" value="<?= $value['id'] ?>">
                    <button class="uk-button uk-button-primary" type="submit">DELETE</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
                </div>

<!--                 <div class="uk-card uk-card-secondary uk-card-body" style="opacity: 0.8">
                </div> -->
            </div>

        </div>
    </div>
</div>
<?php endif; ?>

<div class="uk-section uk-light uk-background-cover" style="background-image: url(views/img/today.jpg)">
</div>

<div class="uk-section-default">
    <div class="uk-section uk-light uk-background-cover uk-height-large" style="background-image: url(views/img/park4.jpg);">
        <div class="uk-container">

            <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                <div class="uk-card uk-card-secondary uk-card-body" style="opacity: 0.8">
                    <h2 class="uk-card-title">Timetable</h2>
                    <!-- <h3 style="opacity: 1">Welcome to the page of our amusement park!On this page you can: buy a ticket, add a loyalty card, and see the schedule and the latest news of our park</h3> -->
                </div>
                <div class="uk-card uk-card-secondary uk-card-body" style="opacity: 0.8">
                    <h2 class="uk-card-title">Weekdays</h2>
                    <h3 style="opacity: 1">9:00 AM | 9:00 PM</h3>
                </div>
                <div class="uk-card uk-card-secondary uk-card-body" style="opacity: 0.8">
                    <h2 class="uk-card-title">Weekends</h2>
                    <h3 style="opacity: 1">8:00 AM | 11:00 PM</h3>
                </div>
            </div>

        </div>
    </div>
</div>

<?php if(user_class::check_role(3)): ?>

<form align='center' class="uk-margin" action="index.php?data_controller=create_a_card" method="post">
    <legend class="uk-legend">Create discount card</legend>
    <input class="uk-input uk-form-blank uk-form-width-large" type="text" placeholder="Card number" name="num" required="">
    <button type='submit' class="uk-button uk-button-primary">Create</button>
</form>

<?php if(is_array($cards)): ?>
<table class="uk-table uk-table-hover uk-table-divider uk-width-1-4" align="center">
    <thead>
        <tr>
            <th class="uk-width-small" style="text-align: center;">Number</th>
            <th class="uk-width-small" style="text-align: center;">Owner</th>
            <th class="uk-width-small" style="text-align: center;">DELETE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cards as $key => $value): ?>
        <tr>
            <td><?= $value['serial_number'] ?></td>
            <td><?= $value['owner'] != NULL ? 'Owner isset' : 'Without owner' ?></td>
            <td style="text-align: center;">
                <form action="index.php?data_controller=delete_a_card" method="post">
                    <input type="hidden" name="card_id" value="<?= $value['id'] ?>">
                    <button class="uk-button uk-button-primary" type="submit">DELETE</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<h3>No one discount card</h3>
<?php endif; ?>

<?php endif; ?>