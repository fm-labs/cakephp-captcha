cakephp-captcha
===============

CakePHP Captcha Plugin


# Install

via composer

    {
        "require": {
            "fm-labs/cakephp-captcha": "dev-master"
        }
    }
 
 
# Quick Setup

1. Enable Plugin

    //File: app/Config/bootstrap.php

    CakePlugin::load('Captcha')
    
3. Setup CaptchaBehavior for model

    //File: app/Model/Post.php
    
    class Post extends AppModel {
    
        public $actsAs = array('Captcha.Captcha');
        
    }
    
3. Use CaptchaFormHelper to embed captcha image in form

    //File: app/View/Post/add.ctp
    
    $this->Helpers->load('Captcha.CaptchaForm');
    
    //...
    
    $this->Form->create('Post');
    $this->Form->input('title');
    
    $this->CaptchaForm->input('captcha');
   
    //...
    
Done!
    
