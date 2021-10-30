<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?= $this->getDependences() ?>
</head>
<body>
    <div class="container">
        <h4 class="purple-text center-align text-lighten-3">login</h4>
        <div class="card-panel width-129 white">
            <div class="container">
                <form class="form" action="/validate" method="post">
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <label for="icon_prefix">email</label>
                                <input class="purple-text" id="icon_prefix" type="email" name="email">
                             </div>
                        </div>
                        <div class="col s9">
                            <div class="input-field">
                                <i class="material-icons prefix">enhanced_encryption</i>
                                <label for="password_prefix">password</label>
                                <input class="purple-text" id="password_prefix" type="password" name="password">
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="input-field">
                                <button type="submit" class="btn purple lighten-2">
                                    <i class="material-icons">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?= tokenCSRF() ?>
                 </form>
            </div>
        </div>
        <div>
            <div class="purple-text text-lighten-2">Crie uma novo usuario</div>
            <br>
            <a href="create/book_store" class="btn blue darken-2">
                <i class="material-icons prefix">create_new_folder</i>
            </a>
        </div>
    </div>
</body>
</html>