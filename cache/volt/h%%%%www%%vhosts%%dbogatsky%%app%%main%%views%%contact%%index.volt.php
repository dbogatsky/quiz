<?php echo $this->getContent(); ?>

<div class="page-header">
    <h2>Contact Me</h2>
</div>

<p>Send me a message and let us know how we can help. Please be as descriptive as possible as it will help us serve you better.</p>

<?php echo Phalcon\Tag::form(array()); ?>
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="name">Your Full Name</label>
            <div class="controls">
                <?php echo Phalcon\Tag::textField(array('name', 'class' => 'input-xlarge')); ?>
                <p class="help-block">(required)</p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Email Address</label>
            <div class="controls">
                <?php echo Phalcon\Tag::textField(array('email', 'class' => 'input-xlarge')); ?>
                <p class="help-block">(required)</p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="comments">Comments</label>
            <div class="controls">
                <?php echo Phalcon\Tag::textArea(array('comment', 'rows' => '5', 'class' => 'input-xlarge')); ?>
                <p class="help-block">(required)</p>
            </div>
        </div>
        <div class="form-actions">
            <?php echo Phalcon\Tag::submitButton(array('Send', 'class' => 'btn btn-primary btn-large')); ?>
        </div>
    </fieldset>
</form>
