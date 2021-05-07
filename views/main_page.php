<div id='main'>
<!-- <div class="uk-background-image uk-background-cover uk-flex uk-flex-left uk-inline uk-flex-column" style="background-image: url(img/today.jpg); height: 800px;">
		<br>
    	<div class="" style="margin-top: 2%;">
    		<h2 class="uk-heading-bullet" align="center">Upcoming Event</h2>
    	</div>
    	<div class="uk-flex uk-flex-center">
    		<div class="uk-card uk-card-default uk-card-body uk-card-hover uk-margin-left">
    			<div class="uk-card-media-top" align="center">
                	<img src="img/bar.jpg" alt="">
            	</div>
            	<div class="uk-card-body">
                	<h3 class="uk-card-title">Media Top</h3>
                	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            	</div>
    		</div>
    		<div class="uk-card uk-card-default uk-card-body uk-margin-left">
    			<div class="uk-card-media-top" align="center">
                	<img src="img/bar.jpg" alt="">
            	</div>
            	<div class="uk-card-body">
                	<h3 class="uk-card-title">Media Top</h3>
                	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            	</div>
    		</div>
    		<div class="uk-card uk-card-default uk-card-body uk-margin-left uk-margin-right">
    			<div class="uk-card-media-top" align="center">
                	<img src="img/bar.jpg" alt="">
            	</div>
            	<div class="uk-card-body">
                	<h3 class="uk-card-title">Media Top</h3>
                	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            	</div>
    		</div>
		</div>
</div> -->
<?php if(is_array($data['news'])): ?>
<div class="uk-flex uk-flex-center uk-margin-top">
	<div class="uk-inline-clip uk-transition-toggle" tabindex="0">
		<div class="uk-background-cover uk-height-large uk-panel uk-width-large uk-transition-scale-up uk-transition-opaque" style="background-image: url('<?= preg_replace('/\s+/', '','./views/img/' . basename($data['news'][0]['nimg'])) ?>');">
			<span class="uk-label uk-label-success" style="margin-top: 30px;margin-left: 30px;"><?= $data['news'][0]['news_type'] ?></span>
            <div class="uk-overlay uk-overlay-default uk-position-bottom">
            	<p class="uk-article-meta" style="color: black;">Written by <span class="uk-label"><?= $data['news'][0]['first_name'] . ' ' . $data['news'][0]['second_name'] . ' ' . $data['news'][0]['last_name'] ?></span> on <?= $data['news'][0]['public_date'] ?>. Posted in <a href="?ipage=news&nid=<?= $data['news'][0]['news_id'] ?>" style="color: black;" class="uk-button uk-button-text">News</a></p>
                <p><?= $data['news'][0]['heading'] ?></p>
            </div>
        </div>
	</div>

    <div class="uk-flex uk-flex-column uk-margin-left">
    	<div class="uk-background-cover uk-panel uk-width-large uk-height-1-1 uk-inline-clip uk-transition-toggle" style="background-image: url('<?= preg_replace('/\s+/', '','./views/img/' . basename($data['news'][1]['img'])) ?>');">
			<span class="uk-label uk-label-success"><?= $data['news'][1]['news_type'] ?></span>
            <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
            	<p class="uk-article-meta" style="color: black;">Written by <span class="uk-label"><?= $data['news'][1]['first_name'] . ' ' . $data['news'][1]['second_name'] . ' ' . $data['news'][1]['last_name'] ?></span> on <?= $data['news'][1]['public_date'] ?>. Posted in <a href="?ipage=news&nid=<?= $data['news'][1]['news_id'] ?>" style="color: black;" class="uk-button uk-button-text">News</a></p>
                <p class="uk-h4 uk-margin-remove"><?= $data['news'][1]['heading'] ?></p>
            </div>
        </div>
    	<div class="uk-background-cover uk-panel uk-width-large uk-height-1-1 uk-inline-clip uk-transition-toggle" style="background-image: url('<?= preg_replace('/\s+/', '','./views/img/' . basename($data['news'][2]['img'])) ?>');">
			<span class="uk-label uk-label-success"><?= $data['news'][2]['news_type'] ?></span>
            <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
            	<p class="uk-article-meta" style="color: black;">Written by <span class="uk-label"><?= $data['news'][2]['first_name'] . ' ' . $data['news'][2]['second_name'] . ' ' . $data['news'][2]['last_name'] ?></span> on <?= $data['news'][1]['public_date'] ?>. Posted in <a href="?ipage=news&nid=<?= $data['news'][1]['news_id'] ?>" style="color: black;" class="uk-button uk-button-text">News</a></p>
                <p class="uk-h4 uk-margin-remove"><?= $data['news'][1]['heading'] ?></p>
            </div>
        </div>
	</div>
	<div class="uk-flex uk-flex-column">
        <div class="uk-background-cover uk-panel uk-width-large uk-height-1-1 uk-inline-clip uk-transition-toggle" style="background-image: url('<?= preg_replace('/\s+/', '','./views/img/' . basename($news_list[3][3])) ?>');">
            <span class="uk-label uk-label-success"><?= $types_arr[$news_list[3][7]] ?></span>
            <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
                <p class="uk-article-meta" style="color: black;">Written by <span class="uk-label"><?= $author4[0][0] ?></span> on <?= $news_list[3][6] ?>. Posted in <a href="?ipage=news&nid=<?= $news_list[3][0] ?>" style="color: black;" class="uk-button uk-button-text">News</a></p>
                <p class="uk-h4 uk-margin-remove"><?= $news_list[3][5] ?></p>
            </div>
        </div>
        <div class="uk-background-cover uk-panel uk-width-large uk-height-1-1 uk-inline-clip uk-transition-toggle" style="background-image: url('<?= preg_replace('/\s+/', '','./views/img/' . basename($news_list[4][3])) ?>');">
            <span class="uk-label uk-label-success"><?= $types_arr[$news_list[4][7]] ?></span>
            <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
                <p class="uk-article-meta" style="color: black;">Written by <span class="uk-label"><?= $author5[0][0] ?></span> on <?= $news_list[4][6] ?>. Posted in <a href="?ipage=news&nid=<?= $news_list[4][0] ?>" style="color: black;" class="uk-button uk-button-text">News</a></p>
                <p class="uk-h4 uk-margin-remove"><?= $news_list[4][5] ?></p>
            </div>
        </div>
	</div>
</div>
<?php endif; ?>

<?php if(!empty($data['baner_data'])): ?>
<div id='banner1'>
	<div class="uk-height-large uk-background-cover uk-overflow-hidden uk-light uk-flex uk-flex-top uk-margin-top" style="background-image: url('<?= preg_replace('/\s+/', '','./img/' . basename($data['baner_data'][0]['img'])) ?>');" >
    	<div class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical">
        	<!-- <h1 uk-parallax="opacity: 0,1; y: -100,0; scale: 2,1; viewport: 0.5;">Headline</h1> -->
        	<h2 uk-parallax="opacity: 0,1; y: 100,0; scale: 0.5,1; viewport: 0.5;"><?= $data['baner_data'][0]['adver_text'] ?></h2>
    	</div>
	</div>
</div>
<?php endif; ?>

<!-- <div style="background-color: #8EB8FC;" class="uk-margin-top">
	<h3>News: </h3>
	<div class="uk-flex-middle" uk-grid>
    <div class="uk-width-2-3@m">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
    </div>
    <div class="uk-width-1-3@m uk-flex-first">
        <img src="img/sun.png" alt="Image">
    </div>
	</div>
	<br>
	<div class="uk-flex uk-flex-center">
    <div class="uk-card uk-card-default uk-card-body">	<div class="uk-flex-middle" uk-grid>
    <div class="uk-width-2-3@m">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
    </div>
    <div class="uk-width-1-3@m uk-flex-first">
        <img src="img/sun.png" alt="Image">
    </div>
	</div></div>
    <div class="uk-card uk-card-default uk-card-body uk-margin-left">	<div class="uk-flex-middle" uk-grid>
    <div class="uk-width-2-3@m">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
    </div>
    <div class="uk-width-1-3@m uk-flex-first">
        <img src="img/sun.png" alt="Image">
    </div>
	</div></div>
    <div class="uk-card uk-card-default uk-card-body uk-margin-left">	<div class="uk-flex-middle" uk-grid>
    <div class="uk-width-2-3@m">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
    </div>
    <div class="uk-width-1-3@m uk-flex-first">
        <img src="img/sun.png" alt="Image">
    </div>
	</div></div>
	</div>
	<br>
</div> -->

<h2 class="uk-heading-bullet" align="center">City companies</h2>
<div uk-slider="center: true" class="uk-margin-top">

    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

        <ul class="uk-slider-items uk-child-width-1-3@l uk-grid">
            <?php foreach ($data['companys'] as $key => $value): ?>
            <li>
                <div class="uk-card uk-card-default uk-height-1-1" style="max-width: 600px;">
                    <div class="uk-card-media-top">
                        <img src="<?= './views/img/fon.jpg' ?>" alt="" style="width: 600px; height: 100%;">
                    </div>
                    <div class="uk-card-footer">
                        <h3 class="uk-card-title"><?= $value['name'] ?></h3>
                        <p><?= $value['description'] ?></p>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>

    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

</div>

<div class="uk-height-large uk-background-cover uk-light uk-flex uk-flex-center" uk-parallax="y: 0;" style="background-image: url('views/img/fall_city.jpg');">
    <div class="uk-height-small" style="margin-top: 150px;"><h1 class="uk-heading-divider uk-heading-large" align="center"><?= count($data['companys']) ?></h1><h4 align="center">Companies</h4></div>
    <div class="uk-height-small" style="margin-top: 150px;margin-left: 200px;"><h1 class="uk-heading-divider uk-heading-large" align="center"><?= count($data['news']) ?></h1><h4 align="center">News</h4></div>
    <!-- <div class="uk-height-small" style="margin-top: 150px;margin-left: 200px;"><h1 class="uk-heading-divider uk-heading-large" align="center"></h1><h4 align="center">Users</h4></div> -->
    <!-- <div class="uk-height-small" style="margin-top: 150px;margin-left: 200px;"><h1 class="uk-heading-divider uk-heading-large" align="center"></h1><h4 align="center">Visits</h4></div> -->
</div>

<div class="uk-section-default">
    <div class="uk-section uk-light uk-background-cover" style="background-image: url(views/img/today.jpg)">
        <div class="uk-container">
            <h2 class="uk-heading-bullet" align="center">Upcoming Event</h2>
            <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                <div>
                <div class="uk-card uk-card-default uk-card-body uk-card-hover transition">
    			<div class="uk-card-media-top" align="center">
                	<img src="views/img/bar.jpg" alt="">
            	</div>
            	<div class="uk-card-body">
                	<h3 class="uk-card-title">Media Top</h3>
                	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            	</div>
    			</div>
                </div>
                <div class="transition">
                <div class="uk-card uk-card-default uk-card-body uk-card-hover">
    			<div class="uk-card-media-top" align="center">
                	<img src="views/img/bar.jpg" alt="">
            	</div>
            	<div class="uk-card-body">
                	<h3 class="uk-card-title">Media Top</h3>
                	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            	</div>
    		  </div>
                </div>
                <div class="transition">
                <div class="uk-card uk-card-default uk-card-body uk-card-hover">
    			<div class="uk-card-media-top" align="center">
                	<img src="views/img/bar.jpg" alt="">
            	</div>
            	<div class="uk-card-body">
                	<h3 class="uk-card-title">Media Top</h3>
                	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            	</div>
    		</div>
                </div>
            </div>

        </div>
    </div>
</div>