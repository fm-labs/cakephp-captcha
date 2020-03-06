<?php $this->loadHelper('Captcha.Captcha'); ?>
<div class="captcha-demo">
    <?= $this->Form->create(null); ?>
    <?= $this->Form->control('foo', ['value' => 'bar']); ?>
    <?php //$this->Captcha->input('captcha'); ?>
    <?= $this->Form->control('captcha', ['type' => 'captcha']); ?>
    <?= $this->Form->submit(); ?>
    <?= $this->Form->end(); ?>
</div>