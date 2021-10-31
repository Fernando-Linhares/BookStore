<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?= $this->getDependences() ?>
</head>
<body>
    <div class="container">
            <h3 class="purple-text center-align">
                Crie um usuario
                <i class="material-icons">collections_bookmark</i>
            </h3>
        <div class="card-panel white">
            <form action="<?= path('register') ?>" method="post">
                <div class="row">
                    <div class="col s6">
                        <div class="input-field">
                            <label for="fname">first name</label>
                            <input type="text" name="first_name" id="fname">
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <label for="lname">last name</label>
                            <input type="text" name="last_name" id="lname" >
                        </div>
                    </div>
                
                
                <div class="col s12">
                    <div class="input-field">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email">
                    </div>
                </div>
                <div class="col s12">
                    <div class="input-field">
                        <label for="password">password</label>
                        <input type="password" name="password" id="password">
                    </div>
                </div>
                <div class="col 12">
                    <button class="btn purple lighten-1" type="submit">
                        <i class="material-icons">check</i>
                    </button>
                </div>
                </div>
                <?= tokenCSRF() ?>
            </form>
        </div>
        <div>
            <div class="purple-text text-lighten-2">Fazer Login</div>
            <br>
            <a href="/" class="btn blue darken-2">
                <i class="material-icons prefix">login</i>
            </a>
        </div>
    </div>
</body>
</html>