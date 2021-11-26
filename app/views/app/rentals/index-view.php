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
            <button class="btn green darken-3">
                novo aluguel
            </button>
            <div id="form" style="display: none;" class="card-panel white">
                <form method="post" action="<?= route('store/rental') ?>">
                <div class="row">
                <h5>book</h5>
                    <?php foreach($this->books as $book): ?>
                        <div>
                            <label for="<?= $book->title ?>">
                                <input type="checkbox" name="book" value="<?= $book->id ?>" id="<?= $book->title ?>">
                                <span><?= $book->title ?></span>
                            </label>
                        </div>
                    <?php endforeach; ?>
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
    <div class="container">
        <div class="card-panel white">
            <button class="btn red darken-3">
                pendencias
            </button>
            <div  style="display: none;" id="table">
                <table>table</table>
            </div>
        </div>
    </div>

    <script>
        let buttonGreen, buttonRed, form, table, flagTable, flagForm;

        flagForm = false;
        flagTable = false;
        buttonGreen = document.querySelector('.btn.green');
        buttonRed = document.querySelector('.btn.red');
        form = document.querySelector('#form');
        table = document.querySelector('#table');

        buttonGreen.addEventListener('click', openForm);
        buttonRed.addEventListener('click', showTable);

        function openForm(){
            if(!flagForm){
                form.style.display = 'block'
                buttonGreen.innerText = 'fechar';
                flagForm = !flagForm;
            }else{
                buttonGreen.innerText = 'novo aluguel'
                form.style.display = 'none';
                flagForm = !flagForm;
            }   
        }

        function showTable(){
            if(!flagTable){
                table.style.display = 'block';
                buttonRed.innerText = 'feichar'
                flagTable = !flagTable;
            }else{
                table.style.display = 'none';
                buttonRed.innerText = 'pendencias'
                flagTable = !flagTable;
            }
        }
    </script>
</body>
</html>