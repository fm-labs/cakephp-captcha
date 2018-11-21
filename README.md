cakephp-captcha
===============

An easy-to-use Captcha Plugin for the [CakePHP Framework](http://www.cakephp.org) using [Securimage PHP Captcha library](http://www.phpcaptcha.org)


# Install

Add to your composer.json

    {
        "require": {
            "fm-labs/cakephp-captcha": "dev-master"
        }
    }
    
or run

    $ composer require fm-labs/cakephp-captcha
 
 
# Quick Setup

1) Enable Plugin

    //File: config/bootstrap.php
    
    Plugin::load('Captcha', ['bootstrap' => true, 'routes' => true);
    
2) Use CaptchaWidget in forms

    //File: In any view template
    $this->loadHelper('Captcha.Captcha');
        
    $this->Form->create(null);
    $this->Form->input('captcha', ['type' => 'captcha']]);
    //$this->Captcha->input('captcha'); // old/deprecated method
    $this->Form->submit();
    $this->Form->end();
     
