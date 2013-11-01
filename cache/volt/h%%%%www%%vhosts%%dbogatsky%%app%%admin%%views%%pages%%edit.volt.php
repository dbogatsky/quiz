<?php echo $this->getContent(); ?>

<a href="/admin/pages" class="btn btn-primary">Pages list</a>
<div style="padding-top: 10px;">
    <form class="form-horizontal" role="form" method="POST">
        <?php foreach ($page as $name => $value) { ?>
            <?php if ($name != 'id' && $name != 'deleted' && $name != 'created_on') { ?>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $name; ?></label>
                    <div class="col-lg-8">
                        <?php if ($name == 'text_ru' || $name == 'text_en') { ?>
                            <?php echo Phalcon\Tag::textArea(array($name, 'value' => $value, 'rows' => '10', 'cols' => '45', 'class' => 'form-control', 'id' => $name)); ?>
                        <?php } else { ?>
                            <?php echo Phalcon\Tag::textField(array($name, 'value' => $value, 'class' => 'form-control')); ?>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-default">Save</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    CKEDITOR[text_ru] = CKEDITOR.replace('text_ru');
    CKEDITOR[text_en] = CKEDITOR.replace('text_en');
</script>