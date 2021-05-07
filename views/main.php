<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/view.php';

	$include_page = 'main.php';
    $title = 'Town of PHD';

	if(isset($_GET['ipage']))
	{
		$include_page = $_GET['ipage'] . '.php';
        if($_GET['ipage'] === 'user_pen')
            $title = 'User penalties';
	}

	$thisDate = getdate();
    $mon = $thisDate['mon'] < 10 ? 0 . $thisDate['mon'] : $thisDate['mon'];
    $day = $thisDate['mday'] < 10 ? 0 . $thisDate['mday'] : $thisDate['mday'];
    $date = $thisDate['year'] . '-' . $mon . '-' . $day;
    $upload_dir = 'C:\Users\alkostyakov\Desktop\city\usrimg\\';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/css/uikit.min.css" />
</head>
<body class="uk-background-muted" style="background-color: #EFEFEF;">
<div class="uk-background-image uk-background-cover uk-height-large uk-flex uk-flex-left uk-flex-middle uk-inline" style="background-image: url(views/img/city-2.jpg);">
    	<div class="uk-margin-left">
    		<a href='index.php'><img src='views/img/pressville-logo.png' alt="logo" style="width: 70%;"></a>
    	</div>
    	<div class="uk-margin-left">
    		<h1 style="color: white;"><?= $title ?></h1>
    		<h3 style="color: white;">Interaction with your city!</h3>
    	</div>
    	<div class="uk-overlay uk-overlay-primary uk-position-bottom" style="margin-left: 8%; margin-right: 8%;">
                <p>Default Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
</div>

<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
<nav class="uk-navbar-container uk-navbar" uk-navbar="mode:click">
    <?php if(isset($_SESSION['login'])): ?>
                <div class="uk-navbar-left">
                    <ul class="uk-navbar-nav">
                        <li>
                            <a href="#" aria-expanded="false" class="">Justify</a>
                            <div class="uk-navbar-dropdown uk-navbar-dropdown-boundary uk-navbar-dropdown-bottom-center" uk-drop="cls-drop: uk-navbar-dropdown; boundary: !nav; boundary-align: true; pos: bottom-justify; flip: x; mode: click" style="width: 1200px; left: 0.0005px; top: 80px;">
                                <div class="uk-navbar-dropdown-grid uk-child-width-1-3@m uk-grid uk-grid-stack" uk-grid="">
                                    <?php if(isset($_SESSION['type']) && $_SESSION['type'] == 'user'): ?>
                                    <div class="uk-first-column">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li class="uk-active"><a href="#">USER</a></li>
                                            <li class="uk-nav-divider"></li>
                                            <li class="uk-parent">
                                                <a href="#">Interaction with the city</a>
                                                <ul class="uk-nav-sub">
                                                    <li><a href="index.php?page_controller=create_request">Create request</a></li>
                                                    <li><a href="index.php?page_controller=company_services">Company's</a></li>
                                                    <li><a href="index.php?page_controller=news_list">News list</a></li>
                                                    <li><a href="index.php?page_controller=user_fine">My fine</a></li>
                                                </ul>
                                            </li>
                                            <?php if(isset($_SESSION['role']) && (in_array(1, array_column($_SESSION['role'], 'id')) || in_array(3, array_column($_SESSION['role'], 'id')))): ?>
                                            <li class="uk-nav-header">Additional features</li>
                                            <li><a href="index.php?page_controller=create_fine"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> Create fine</a></li>
                                            <li><a href="index.php?page_controller=company_list"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> Company list</a></li>
                                            <li><a href="index.php?ipage=user_list"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> User list</a></li>
                                            <li><a href="index.php?page_controller=create_complaint"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> Create complaint</a></li>
                                            <li><a href="index.php?page_controller=tender_list"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> Tender list</a></li>
                                            <li><a href="index.php?page_controller=company_list"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> Company list</a></li>
                                            <li><a href="index.php?page_controller=create_tender"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> Create tender</a></li>
                                            <li><a href="index.php?page_controller=create_adver"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> Create banner</a></li>
                                            <li><a href="index.php?news_controller=create_page"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> Create news</a></li>
                                            <li><a href="index.php?ipage=create_news"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> Create tender</a></li>
                                            <li><a href="index.php?page_controller=request_list"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> Request list</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <?php else: ?>
                                    <div>
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li class="uk-active"><a href="#">COMPANY</a></li>
                                            <li class="uk-parent">
                                                <a href="#">Interaction with the city</a>
                                                <ul class="uk-nav-sub">
                                                    <li><a href="index.php?page_controller=create_request">Create request</a></li>
                                                    <li><a href="index.php?page_controller=tender_list">Participation in the tender</a></li>
                                                    <li><a href="index.php?ipage=compani_fine">Complaints</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
    <?php endif; ?>

                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">
                        <li>
                            <a href="#" aria-expanded="false"><?= isset($_SESSION['type']) ? 'Auth [' . $_SESSION['login'] . ']' : 'Auth/Registration' ?></a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <?php if(!isset($_SESSION['login'])): ?>
                                    <li class="uk-active" align='center'><a class="uk-button uk-button-primary uk-margin-small-right" type="button" href="index.php?page_controller=registration" style="color:white;">Registration</a></li>
                                    <li class='uk-margin-top' align='center'>           
                                        <button class="uk-button uk-button-primary uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-push" style="color:white;">Sign in</button>
                                    </li>
                                    <?php else: ?>
                                    <?php if($_SESSION['type'] == 'user'): ?>
                                    <li class='uk-margin-top' align='center'>           
                                        <a class="uk-button uk-button-primary uk-margin-small-right" type="button" href='index.php?page_controller=user_page' style="color:white;">My page</a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($_SESSION['type'] == 'company'): ?>
                                    <li class='uk-margin-top' align='center'>           
                                        <a class="uk-button uk-button-primary uk-margin-small-right" type="button" href='index.php?page_controller=company_page' style="color:white;">My page</a>
                                    </li>
                                    <?php endif; ?>
                                    <li class='uk-margin-top' align='center'>
                                        <form action="index.php?user_controller=logout" method="post">   
                                            <button class="uk-button uk-button-primary uk-margin-small-right" type="submit" style="color:white;">Logout</button>
                                        </form>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>

<div id="offcanvas-push" uk-offcanvas="mode: push; overlay: true">
    <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <h3>Auth</h3>

<form action='index.php?user_controller=auth' method="post">
    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input uk-input uk-width-large" type="text" name='login'>
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input class="uk-input uk-width-large" type="password" name='pas'>
        </div>
    </div>

    <div class="uk-margin">
        <select class="uk-select" name='type'>
            <option value="user">User</option>
            <option value="com">Compani</option>
        </select>
    </div>

    <button class="uk-button uk-button-primary uk-input uk-width-large">Authentication</button>
</form>

    </div>
</div>

<?php require_once $data['page']; ?>
<div class="uk-height-medium uk-background-cover uk-light uk-flex uk-flex-right" style="background-image: url('views/img/footer.jpg');">
<!--     <div class="uk-card uk-card-default uk-card-body">Item 1</div>
    <div class="uk-card uk-card-default uk-card-body uk-margin-left">Item 2</div>
    <div class="uk-card uk-card-default uk-card-body uk-margin-left">Item 3</div> -->
</div>
</body>

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>
</html>
<?php
    if(isset($_SESSION['message']))
    {
        view::send_message(isset($_SESSION['message'][0]) ? $_SESSION['message'][0] : $_SESSION['message']['msg'], isset($_SESSION['message'][0]) ? $_SESSION['message'][1] : $_SESSION['message']['type']);
        unset($_SESSION['message']);
    }
?>