<?php foreach ($categories as $key => $news): ?>
    <div>
        <h1><a href="<?=route('news.categoryId', [$news['id']])?>"><?=$news['name']?></a></h1>
        <hr>
    </div>
<?php endforeach; ?>
