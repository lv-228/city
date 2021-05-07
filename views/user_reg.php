<div class="uk-flex uk-flex-center">
<form class="uk-form-horizontal uk-margin-large uk-margin-top" action="index.php?user_controller=create_user" method="post">
    <input type="hidden" name="user" value="true">

    <h1 class="uk-heading-line uk-text-center"><span>Login/Password</span></h1>
    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Login</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Login" name='login' required="">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Password</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="password" placeholder="Password" name='pas' required="">
        </div>
    </div>

<h1 class="uk-heading-line uk-text-center"><span>User info</span></h1>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >First Name</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="First Name" name='first_name' required="">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Second Name</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Second Name" name='second_name' required="">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Last Name</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Last Name" name='last_name' required="">
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >E-mail</h3></label>
        <div class="uk-form-controls uk-width-1-1">
            <input class="uk-input" id="form-horizontal-text" type="email" placeholder="E-mail" name='email' required="">
        </div>
    </div>

<h1 class="uk-heading-line uk-text-center"><span>User data</span></h1>

<!-- <div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >S\N Document</h3></label>
    <div class="uk-form-controls uk-width-1-1">
        <input class="uk-input" id="form-horizontal-text" type="text" placeholder="S\N Document">
    </div>
</div>

<div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-select"><h3 class="uk-heading-bullet" >Document type</h3></label>
    <div class="uk-form-controls uk-width-1-1">
        <select class="uk-select" id="form-horizontal-select">
            <option>Option 01</option>
            <option>Option 02</option>
        </select>
    </div>
</div> -->

<div class="uk-margin">
    <label class="uk-form-label" for="form-horizontal-text"><h3 class="uk-heading-bullet" >Birth date</h3></label>
    <div class="uk-form-controls uk-width-1-1">
        <input class="uk-input" id="form-horizontal-text" type="date" placeholder="Age" max='<?= $date ?>' min='1900-01-01' name='birth_date' required="">
    </div>
</div>

<button class="uk-button uk-button-primary uk-input uk-width-1-1" >Registration</button>

</form>
</div>