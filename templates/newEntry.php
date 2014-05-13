<?= $header ?>
<?= $navigation ?>
<section id="entries">
    <?php if (count($errors) > 0): ?>
    <div style="border:1px solid red">
            <?php foreach ($errors as $error): ?>
                <?= $error ?><br/>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if ($successfull): ?>
    <div style="border:1px solid green">
            <?= _('Entry Saved') ?>
        </div>
    <?php endif; ?>
    <form action="?action=new" method="POST">
        <?= _('Title') ?>:<br/> <input type="text" name="title">
        <br/>
        <?= _('Content') ?>:<br/>
        <textarea name="content"></textarea><br/>
        <button type="submit" name="save"><?= _('Save') ?></button>
    </form>
</section>
<?= $footer ?>