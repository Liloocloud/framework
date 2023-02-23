<?php
require_once "../../_Kernel/___Kernel.php";
$Mkd = new Helpers\Markdown;
$Info = $Mkd->text(file_get_contents("./info.md"));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc OSM</title>

    <link href="<?=BASE_ADMIN_ASSETS?>uikit/css/uikit.css" rel="stylesheet">
    <style>
        code{
            padding: 2% !important;
            max-width: 95% !important;
            display: block;
            overflow-x: scroll !important;
        }
        pre{
            border: none;
            background-color: #222;
            color: #f7f7f7;
        }
    </style>

</head>
<body>

<div class="uk-container uk-margin-bottom">
    <?=$Info?>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?=BASE_ADMIN_ASSETS?>uikit/js/uikit.min.js"></script>
    <!-- <script>$('table').addClass('uk-table uk-table-divider uk-card uk-card-default uk-padding-small')</script> -->
</body>
</html>
