<html>
    <head>
        <meta charset="utf-8">
        <?php echo Phalcon\Tag::getTitle(); ?>
        <?php echo Phalcon\Tag::stylesheetLink('css/style.css'); ?>
    </head>
    <body>
        <header>
            <?php if ($player) { ?>
                <a href="/end">Log Out</a>
            <?php } ?>
        </header>

        <?php echo $this->getContent(); ?>

        <hr>
        <footer>
            <p>&copy; Company 2013</p>
        </footer>

    </body>
</html>