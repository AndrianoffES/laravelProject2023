<?php foreach ($categories as $key => $news): ?>
    <div>
        <h1><?=$news['category']?></h1>
        <h2><?=$news['title']?></h2>
        <p><?=$news['author']?> -  <?=$news['created_at']->format('d-m-Y H:i')?></p>
        <p><?=$news['description']?></p>
        <hr>
    </div>
<?php endforeach; ?>
