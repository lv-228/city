<form style="text-align: center;" method="post" action="index.php?news_controller=create" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="999999">

        <fieldset class="uk-fieldset">

        <legend class="uk-legend">Create news</legend>
<hr class="uk-divider-icon">
        <div class="uk-margin">
            <label class="uk-form-label" for="type_select"><h3>Type</h3></label>
            <div class="uk-form-controls">
            <select id='type_select' class="uk-select uk-width-large" name="type">
            <?php foreach ($data['types'] as $key => $value): ?>
                <option value="<?= $value['id'] ?>"><?= $value['descript'] ?></option>
            <?php endforeach; ?>
            </select>
            </div>
        </div>

        <div class="uk-margin ">
            <input name='heading' class="uk-input uk-width-large" type="text" placeholder="Name">
        </div>

        <div class="uk-margin">
            <textarea name='descript' class="uk-textarea uk-width-large" rows="5" placeholder="Description" style="max-height: 200px; max-width: 600px; min-width: 600px; min-height: 150px"></textarea>
        </div>

        <div class="uk-margin">
            <textarea name='news_text' class="uk-textarea uk-width-large" rows="5" placeholder="News text" style="max-height: 400px; max-width: 600px; min-width: 600px; min-height: 150px"></textarea>
        </div>

        <div class="uk-margin" uk-margin>
        <div uk-form-custom="target: true">
            <input type="file" name='img' value="" accept="image/jpeg,image/png, image/jpg">
            <input class="uk-input" type="news_text" placeholder="Select file" disabled style="width: 1000px">
        </div>
    </div>

    </fieldset>

    <button class="uk-button uk-button-primary uk-input uk-width-1-4 uk-margin" type='submit'>Create</button>
</form>