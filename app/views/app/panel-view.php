
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
    <header>
        <?= $this->include('app/header') ?>
    </header>
    <div style="width: 300px; height: 100px; border-radius: 0 30px 30px 0;" class="card-panel purple lighten-3">
    <div class="row">
        <div class="col s4">
            <div class="btn-floating btn-large waves-effect waves-light black">
                <?php if(empty($this->user->image)):?>
                    <i class="material-icons">person</i>
                <?php endif; ?>
            </div>
        </div>
        <div class="col s4">
            <div>
                <?= $this->user->getUserName() ?>
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
                    <a class="btn green" href="<?= route('add') ?>">
                        <i class="material-icons">add</i>
                    </a>    
                </div>
                <div class="green-text">
                    Add books
                </div>
            </div>
            <div class="card purple lighten-4" style="padding: 30px;">
                
                <?php if(is_string($this->books)): ?>
                    <div class="red-text center-align">
                        <?= ucfirst($this->books) ?>
                    </div>
                <?php else: ?>

                <?php foreach($this->books as $book): ?>
                        <div class="col s12 m7">
                            <div class="card horizontal">
                            <div class="card-image">
                                <img src="<?= $book->getImage() ?>">
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                    <h4>
                                        <?= $book->getTitle() ?>
                                    </h4>
                                    <p>
                                        <?= $book->getResume() ?>
                                    </p>
                                    <button class="btn red"><?= $book->getCategory() ?></button>
                                </div>
                                <div class="card-action"> 
                                <a  href="/rental/<?= $book->getBookId() ?>">rental</a>
                                </div>
                            </div>
                            </div>
                </div>
                <?php endforeach; ?>
    
                <?php endif; ?>
            </div>

            <div style="margin: auto; text-align: center;">
                <ul class="pagination">
                    <li ><a href="<?= route('dashboard',$this->pages->getBackPage()) ?>"><i class="material-icons">chevron_left</i></a></li>
                    <?php foreach($this->pages->getLinks() as $page ): ?>
                        <li <?= $page->getClass() ?>>
                            <a href="<?= route('dashboard',$page->link()) ?>"> <?= $page->link() ?> </a>
                        </li>
                    <?php endforeach; ?>
                    <li class="waves-effect"><a href="<?= route('dashboard',$this->pages->getNextPage()) ?>"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
            </div>
    </div>
    <footer>
        <?=  $this->include('app/footer') ?>
    </footer>
</body>
</html>