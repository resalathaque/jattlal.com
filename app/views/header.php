<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo @$title ?></title>
    <?php if(!empty($description)): ?>
        <meta name="description" content="<?php echo $description ?>">
    <?php endif ?>

    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com/" />
    <link rel="dns-prefetch" href="https://files.jattlal.com/" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.4/css/bulma.min.css" integrity="sha512-HqxHUkJM0SYcbvxUw5P60SzdOTy/QVwA1JJrvaXJv4q7lmbDZCmZaqz01UPOaQveoxfYRv1tHozWGPMcuTBuvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="has-background-dark">
<nav class="navbar is-black" role="navigation" aria-label="main navigation">
    <div class="container is-fullhd px-2">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <img width="100%" src="/static/logo.svg" alt="JattLal.com" title="Download unlimited free mp3 music">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
    </div>
</nav>