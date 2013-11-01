<?php echo $this->getContent(); ?>

<p>Hi <?php echo $name; ?>, let's start the Football Guiz!</p>

<p>You are registered as <?php echo $email; ?>.</p>

<p>Please select game topic:</p>

<?php echo Phalcon\Tag::form(array('method' => 'post')); ?>
    <?php foreach ($topics as $topic) { ?>
        <?php echo Phalcon\Tag::radioField(array('topic_id', 'id' => $topic->id, 'value' => $topic->id)); ?>
        <label><?php echo $topic->name; ?></label>
    <?php } ?>
    <?php echo Phalcon\Tag::submitButton(array('Send')); ?>
</form>

