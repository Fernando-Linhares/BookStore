<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR</title>
    <?= $this->getDependences() ?>
</head>
<body>
    <div class="container">
        <div class="card-panel">
            <div class="red-text center-align">
                <?= $this->data->message ?>
            </div>
        </div>
    </div>
</body>
</html>