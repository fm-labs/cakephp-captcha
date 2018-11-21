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
    
    Plugin::load('Captcha')
    
2) Setup CaptchaBehavior for model
    
    //File: In any model tabel (src/Model/Table/ModelName.php)
    
    class ModelName {
    
        public function initialize()
        {
            // ... initialization code ...
            $this->addBehavior('Captcha.Captcha');
        }
        
    }
    
3) Use CaptchaFormHelper/CaptchaWidget to embed captcha image in forms

    //File: In any view template
        
    $this->Form->create(null);
    $this->Form->input('captcha', ['type' => 'captcha', 'captcha' => [/*Captcha Options here*/]]);
    $this->Form->submit();
    $this->Form->end();
     
    
