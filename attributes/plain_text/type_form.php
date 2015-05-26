<?php defined('C5_EXECUTE') or die('Access Denied.') ?>
<fieldset>
    <legend><?= t('Attribute Text') ?></legend>

    <?= $editor->outputStandardEditor('value', $value) ?>
</fieldset>