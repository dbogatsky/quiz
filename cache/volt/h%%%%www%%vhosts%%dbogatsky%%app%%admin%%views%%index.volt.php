<html>
    <head>
        <meta charset="utf-8">
        <?php echo Phalcon\Tag::getTitle(); ?>
        <?php echo Phalcon\Tag::stylesheetLink('css/admin/style.css'); ?>
        <?php echo Phalcon\Tag::stylesheetLink('css/bootstrap/css/bootstrap.css'); ?>
        <?php echo Phalcon\Tag::stylesheetLink('css/bootstrap/css/bootstrap-theme.css'); ?>
        <?php echo Phalcon\Tag::javascriptInclude('js/fckeditor/ckeditor.js'); ?>
    </head>

    <body>
        <div class="bs-docs-container">
            <div class="col-md-9" role="main">
                <div class="header">
                    <span class="title">Admin panel.</span>
                    <a href="/admin/login/end" class="float-right">Log Out</a>
                </div>
                <div class="menu">
                    <div class="list-group">
                        <a href="/admin/pages" class="list-group-item <?php if ($controller == 'pages') { ?> active <?php } ?>">Pages</a>
                        <a href="/admin/players" class="list-group-item <?php if ($controller == 'players') { ?> active <?php } ?>">Users</a>
                        <a href="/admin/game" class="list-group-item <?php if ($controller == 'game') { ?> active <?php } ?>">Game</a>
                    </div>
                </div>
                <div class="container">
                    <a href="/admin" class="btn btn-primary">Main Page</a>
                    <?php echo $this->getContent(); ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>