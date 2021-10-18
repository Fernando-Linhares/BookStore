<?php use Application\Mvc\View\CardsComponent; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->data->title ?></title>
    <?= $this->getDependences() ?>
</head>
<body>
    <header>
        <?= $this->include('app/header') ?>
    </header>

    <div class="container">
        <?php 
            $books = [(object) ['description'=>'example','title'=>'example title','image'=>'blabla'],];
        foreach($books as $book): ?>
            <?= $this->getComponent(new CardsComponent($book)) ?>
        <?php endforeach; ?>
    </div>
    <footer>
        <?=  $this->include('app/footer') ?>
    </footer>
</body>
</html>