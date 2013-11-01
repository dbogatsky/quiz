<html>
    <head>
        <meta charset="utf-8">
        <?php echo Phalcon\Tag::getTitle(); ?>
        <?php echo Phalcon\Tag::stylesheetLink('css/bootstrap/css/bootstrap.css'); ?>
        <?php echo Phalcon\Tag::stylesheetLink('css/bootstrap/css/bootstrap-theme.css'); ?>
    </head>

    <body>
        <?php echo $this->getContent(); ?>
        <div style="padding-top: 10px;">
            <form class="form-horizontal" role="form" method="POST">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Login</label>
                    <div class="col-lg-2">
                        <?php echo Phalcon\Tag::textField(array('email', 'class' => 'form-control')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-2">
                        <?php echo Phalcon\Tag::passwordField(array('password', 'class' => 'form-control')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" class="btn btn-default">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>