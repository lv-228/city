<div class="uk-flex uk-flex-center">
<form class="uk-form-horizontal uk-margin-large uk-margin-top" action="index.php?user_controller=create_company" method="post">
    <h1 class="uk-heading-line uk-text-center"><span>Login/Password</span></h1>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Login</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Login" required="" name="login">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Password</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="password" placeholder="Password" required="" name="pas">
        </div>
    </div>

<h1 class="uk-heading-line uk-text-center"><span>Company info</span></h1>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Name</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Name" required="" name='name'>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Legal address</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Legal address" required="" name="legal_address">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Physical address</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Physical address" required="" name='physical_address'>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Phone</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Phone" required="" name='phone'>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >E-mail</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="E-mail" required="" name='email'>
        </div>
    </div>


<div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-select"><h3 class="uk-heading-bullet" >Type</h3></label>
    <div class="uk-form-controls uk-width-1-1">
        <select class="uk-select" id="form-horizontal-select" name='type'>
            <?php foreach ($data['c_type'] as $key => $value): ?>
                <option value="<?= $value['id'] ?>"><?= $value['descript'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<h1 class="uk-heading-line uk-text-center"><span>About</span></h1>

<div class="uk-margin" style="max-width: 700px;">
    <textarea class="uk-textarea" rows="5" placeholder="Textarea" style="max-height: 500px;" name='description'></textarea>
</div>

<button class="uk-button uk-button-primary uk-input uk-width-1-1" >Registration</button>

</form>
</div>

<div id="modal-overflow" uk-modal>
    <div class="uk-modal-dialog">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Headline</h2>
        </div>

        <div class="uk-modal-body" uk-overflow-auto>

            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Full name</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Full name">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Car reg</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Car reg">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Position</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Position">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Email">
                </div>
            </div>
        </div>

        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="button">Save</button>
        </div>

    </div>
</div>