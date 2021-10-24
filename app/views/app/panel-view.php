<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->data->title ?></title>
    <?= $this->getDependences() ?>
</head>
<body style="background-color: rgb(230,230,230);">
    <header>
        <?= $this->include('app/header') ?>
    </header>
    <div style="margin:auto; text-align: right;">
        <a href="" class="btn btn-sm m-2 p-2 btn-outline-danger">exit</a>
    </div>

    <div class="container ">
        <div class="card card-border">
           
            <div class="card-body">
                <?php foreach($this->data->books as $book): ?>
                <div class="card card-border w-10 d-inline-block p-3 m-3" >
                    <div class="card-title">
                        <?= $book->title ?>
                    </div>
                    <div class="card-body">
                        <img class="img" width="100px" height="150px" src="<?= $book->book_cover ?>">
                        <hr>
                        <div>author: <?= $book->author->first_name . $book->author->last_name ?></div>
                        <hr>
                        <a class="btn btn-success" href="/rental/<?= $book->id ?>">location</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div style="margin: auto; text-align: center;">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a href="" class="page-link">Previous</a></li>
                        <li class="page-item active"><a href="" class="page-link">1</a></li>
                        <li class="page-item"><a href="" class="page-link">2</a></li>
                        <li class="page-item"><a href="" class="page-link">3</a></li>
                        <li class="page-item"><a href="" class="page-link">4</a></li>
                        <li class="page-item"><a href="" class="page-link">Next</a></li>

                    </ul>
                </nav>
            </div>
            </div>
    </div>
    <footer>
        <?=  $this->include('app/footer') ?>
    </footer>
</body>
</html>