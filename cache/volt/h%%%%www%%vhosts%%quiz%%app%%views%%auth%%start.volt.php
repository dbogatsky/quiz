<?php echo $this->getContent(); ?>

<?php echo Phalcon\Tag::form(array('method' => 'post')); ?>
    <label>Name</label>
    <?php echo Phalcon\Tag::textField(array('name')); ?>
    <label>Email</label>
    <?php echo Phalcon\Tag::textField(array('email')); ?>
    <?php echo Phalcon\Tag::submitButton(array('Send')); ?>
</form>