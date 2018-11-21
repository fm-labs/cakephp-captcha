<?php $this->loadHelpers('Captcha.Captcha'); ?>
<div class="captcha-demo">
    <?= $this->Form->create(null); ?>
    <?= $this->Form->input('foo', ['value' => 'bar']); ?>
    <?= $this->Captcha->input('captcha'); ?>
    <?= $this->Form->submit(); ?>
    <?= $this->Form->end(); ?>
</div>