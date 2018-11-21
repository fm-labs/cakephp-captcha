<?php $this->loadHelper('Captcha.Captcha'); ?>
<div class="captcha-demo">
    <?= $this->Form->create(null); ?>
    <?= $this->Form->input('foo', ['value' => 'bar']); ?>
    <?php //$this->Captcha->input('captcha'); ?>
    <?= $this->Form->input('captcha', ['type' => 'captcha']); ?>
    <?= $this->Form->submit(); ?>
    <?= $this->Form->end(); ?>
</div>