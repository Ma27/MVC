<?= $header ?>
<?= $navigation ?>
<section id="entries">
    <?php foreach ($entries as $entry): ?>

    ID: <?= $entry->id ?> <br/>
        Title: <?= $entry->title ?><br/>
        Content: <?= $entry->content ?><br/>
        Created: <?= $entry->created ?>
        <hr/>
    <?php endforeach; ?>
</section>
<?= $footer ?>