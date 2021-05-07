<?php
        if(!is_array($data['news']))
        {
            echo '<h3 align="center">News not found</h3>';
            return;
        }
        $creator = $data['user']->get_by_id($data['news'][0]['author']);
        $types   = $data['news_type_obj']->parse_query_result($data['news_type_obj']->find_all());
        foreach ($types as $key => $value)
        {
            $types_arr[$value['id']] = $value['descript'];
        }
?>

<div class="uk-panel uk-margin-bottom uk-margin-left uk-margin-top">
    <img class="uk-border-rounded uk-align-left uk-margin-remove-adjacent uk-margin-left uk-margin-top" src="<?= preg_replace('/\s+/', '','./views/img/' . basename($data['news'][0]['img'])) ?>" width="600px" height="400px" alt="Example image">
<span class="uk-label uk-label-success"><?= $types_arr[$data['news'][0]['type']] ?></span>
    <h1 class="uk-article-title" align="center"><a class="uk-link-reset" href=""><?= $data['news'][0]['heading'] ?></a></h1>
<hr class="uk-divider-small">
    <p class="uk-article-meta" style="font-size: 20px;">Written by <a href="#"><?= $creator[0]['id'] ?></a> on <?= $data['news'][0]['public_date'] ?>.</p>
<hr class="uk-divider-small">
    <p class="uk-text-lead" align="center"><?= $data['news'][0]['descript'] ?></p>

    <p>&nbsp&nbsp&nbsp&nbsp<?= $data['news'][0]['news_text'] ?></p>

    <div class="uk-grid-small uk-child-width-auto" uk-grid>
        <div>
            <a class="uk-button uk-button-text" href="#">5 Comments (in developing)</a>
        </div>
    </div>

</div>