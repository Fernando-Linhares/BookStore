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
     <a href="<?= route('dashboard') ?>" class="btn red"> <i class="material-icons">arrow_back</i></a>
 </div>
    <div class="container">
        <div class="card-panel white">
            <div class="card-panel white">
                <form method="post" action="<?= route('store/rental') ?>">
                <input type="hidden" value="<?= $this->book->id ?>" name="book">
                <div class="row">
                <h5>book</h5>
                    <div class="col s12 m7">
                            <div class="card">
                            <div class="card-image">
                                <img src="<?= route($this->book->book_cover) ?>">
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                    <h4>
                                        <?= $this->book->title ?>
                                    </h4>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
                <div class="row">
                <h5>Cliente</h5>
                    <?php foreach($this->customers as $customer): ?>
                        <div>
                            <label for="<?= $customer->getName() ?>">
                                <input type="checkbox" name="customer" value="<?= $customer->id ?>" id="<?= $customer->getName() ?>">
                                <span><?= $customer->getName() ?></span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div>
                    <h5>Data</h5>
                <label for="">data</label>
                        <input type="date" name="date" id="">
                </div>
                <div>
                    <h5>Valor</h5>
                    <input type="number" name="to_pay" id=""><span>R$</span>
                </div>

                <div class=""><button class="btn" type="submit">salvar <i class="material-icons">save</i></button></div>
                <?= tokenCSRF() ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>