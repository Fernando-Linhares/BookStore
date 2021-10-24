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
        <div class="card card-border d-inline-block p-3 m-3" >
            <div class="card-title">
                <?= $this->data->book->title ?>
            </div>
            <div class="card-body">
                <img src="<?= $this->data->book->book_cover ?>">
                <hr>
            </div>
        </div>
    </div>
    <footer>
        <?=  $this->include('app/footer') ?>
    </footer>
</body>
</html>