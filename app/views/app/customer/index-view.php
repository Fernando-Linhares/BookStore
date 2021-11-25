<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title ?></title>
    <?= $this->getDependences() ?>
</head>
<body style="background-color: rgb(230,230,230);">
    <div class="container">
        <div class="card-panel white">
            <form action="<?= route('') ?>" method="post">
                
            </form>
        </div>
    </div>
</body>
</html>