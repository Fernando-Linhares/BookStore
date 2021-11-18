<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Document</title>
   <?= $this->getDependences() ?>
</head>
<body style="background: rgba(0,0 ,0,0.100 );">
    <div class="container">
        <div class="card-panel white">
            <h4 class="green-text center-align">Add a new book</h4>
            <form action="<?= route('save-book') ?>" method="post">
                <div class="">
                    <label for="title">title</label>
                    <input type="text" name="title" id="title">
                </div>
                <div>
                    <h5>Categories</h5>
                    <?php foreach($this->categories as $category): ?>
                        <div>
                            <label for="<?= $category->name ?>">
                                <input type="checkbox" name="<?= $category->name ?>" id="<?= $category->name ?>">
                                <span>
                                    <?= $category->name ?>
                                </span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div>
                    <h5>Author</h5>
                    <?php foreach($this->authors as $author): ?>
                        <div>
                            <label for="<?= $author->getName() ?>">
                                <input type="checkbox" name="<?= $author->getName() ?>" id="<?= $author->getName() ?>">
                                <span><?= $author->getName() ?></span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col s3">
                        <label for="">published in</label>
                        <input type="date" name="" id="">
                    </div>
                    <div class="col s3">
                        <label for="image" class="btn padding">image</label>
                        <input name="image" id="image" class="hide" type="file">
                    </div>
                </div>
                
                <div>
                    <label for="">description</label>
                    <textarea class="materialize-textarea" name="description" id="" cols="30" rows="10"></textarea>
                </div>

                <div class=""><button class="btn" type="submit">save <i class="material-icons">save</i></button></div>
                <?= tokenCSRF() ?>
            </form>
        </div>
    </div>
    
</body>
</html>