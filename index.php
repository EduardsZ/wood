<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/woodart/pfnc/funcs.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/woodart/pfnc/index.php';
?>

<!DOCTYPE html>
<html lang="<?=$sett['lang']?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Woodart</title>
    <link rel="stylesheet" href="/assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/woodart.css">
    <script src="/assets/libs/axios/axios.min.js"></script>
    <script src="/assets/js/woodart.js"></script>
</head>
<body>
    <div class="userDetailer">
        <div class="container-fluid text-right mt-2">
            <button type="button" class="btn btn-info btn-mywidth" onclick="showUserDetails(0,0)"><?=$langFile[$sett['lang']]['hideDetails']?></button>
        </div>
        <div class="container-fluid mt-2">
            <h3 id="username"></h3>
            <div id="userdata"></div>
        </div>
    </div>
    <div class="container">
        <header class="row">
            <h1 class="w-100 text-center"><?=$langFile[$sett['lang']]['name']?></h1>
        </header>
        <aside class="container-fluid text-right">
            <div class="btn-group" role="group" aria-label="Basic example">
                <?php foreach ($langs as $lang) : ?>
                <?php if($lang != $_COOKIE['lang']) : ?>
                <button class="btn btn-info" onclick="changeLang('<?=$lang?>')"><?=strtoupper($lang)?></button>
                <?php endif ?>
                <?php endforeach ?>
            </div>
        </aside>
        <nav class="row">
            <a href="/">Main</a>
        </nav>
        <main class="row">
            <p><?=$langFile[$sett['lang']]['descParagraph']?></p>
            <h3 class="row w-100 text-center mt-3"><?=$langFile[$sett['lang']]['ActiveUsers']?></h3>
            <div class="row w-100">
                <?php if($usersIn) : ?>
                <ul class="list-group mt-1">
                    <?php foreach($usersIn as $user) : ?>
                    <li class="list-group-item">
                        <span  class="badge badge-light listname"><?=$user['name']?></span>
                        <button type="button" class="btn btn-info btn-mywidth" onclick="sendEvent1('out', <?=$user['card']?>)"><?=$langFile[$sett['lang']]['Throwout']?></button>
                        <button type="button" class="btn btn-info btn-mywidth" onclick="showUserDetails(<?=$user['id']?>,1)"><?=$langFile[$sett['lang']]['showDetails']?></button>
                    </li>
                    <?php endforeach ?>
                </ul>
                <?php else : ?>
                <h4 class="w-100">(<?=$langFile[$sett['lang']]['None']?>)</h4>
                <?php endif ?>
            </div>
            <h3 class="row w-100 text-center mt-3"><?=$langFile[$sett['lang']]['InactiveUsers']?></h3>
            <div class="row w-100">
                <?php if($usersOut) : ?>
                <ul class="list-group mt-1">
                    <?php foreach($usersOut as $user) : ?>
                    <li class="list-group-item w-100">
                        <span  class="badge badge-light listname"><?=$user['name']?></span>
                        <button type="button" class="btn btn-info btn-mywidth" onclick="sendEvent1('in', <?=$user['card']?>)"><?=$langFile[$sett['lang']]['Pullin']?></button>
                        <button type="button" class="btn btn-info btn-mywidth" onclick="showUserDetails(<?=$user['id']?>,1)"><?=$langFile[$sett['lang']]['showDetails']?></button>
                    </li>
                    <?php endforeach ?>
                </ul>
                <?php else : ?>
                <h4 class="w-100">(<?=$langFile[$sett['lang']]['None']?>)</h4>
                <?php endif ?>
            </div>

        </main>
        <footer class="row"></footer>
    </div>
</body>
</html>