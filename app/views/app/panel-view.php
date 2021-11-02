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
    <div style="width: 300px; height: 100px; border-radius: 0 30px 30px 0;" class="card-panel purple lighten-3">
    <div class="row">
        <div class="col s4">
            <div class="btn-floating btn-large waves-effect waves-light black">
                <?php if(empty($this->data->user->image)):?>
                    <i class="material-icons">person</i>
                <?php endif; ?>
            </div>
        </div>
        <div class="col s4">
            <div>
                <?= $this->data->user->first_name .'&nbsp&nbsp' . $this->data->user->last_name?>
                <div style="margin-top: 5px; ;">
                    <a class="btn red" href="logout"><i class="material-icons">arrow_back</i></a>
                </div>
            </div>
        </div>
    </div>
       
    </div>
      <div class="container">
        <div class="card-panel">
            <div>
                <div >
                    <a class="btn green" href="/dashboard/add">
                        <i class="material-icons">add</i>
                    </a>    
                </div>
                <div class="green-text">
                    Add books
                </div>
            </div>
            <div class="card red lighten-4" style="padding: 30px;">
                
                <?php if(is_string($this->data->books)): ?>
                    <div class="red-text center-align">
                        <?= ucfirst($this->data->books) ?>
                    </div>
                <?php else: ?>

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
                        <a class="btn" href="/rental/<?= $book->id ?>">location</a>
                    </div>
                </div>
                <?php endforeach; ?>
    
                <?php endif; ?>
            </div>
            <div style="margin: auto; text-align: center;">
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
            </div>
    </div>
    <footer>
        <?=  $this->include('app/footer') ?>
    </footer>
</body>
</html>