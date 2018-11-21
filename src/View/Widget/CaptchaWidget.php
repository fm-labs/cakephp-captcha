<?php

namespace Captcha\View\Widget;

use Cake\View\Form\ContextInterface;
use Cake\View\View;
use Cake\View\Widget\BasicWidget;

class CaptchaWidget extends BasicWidget
{
    /**
     * View
     */
    protected $_View;

    public function __construct($templates, View $view)
    {
        parent::__construct($templates);

        $this->_templates->add([
            'captcha_container' => '<div{{attrs}}>{{image}}{{reload}}</div>'
        ]);

        $this->_View = $view;
    }

    /**
     * @TODO Refactor hard-coded captcha image url
     */
    public function render(array $data, ContextInterface $context)
    {
        $captchaImageUrl = ['plugin' => 'Captcha', 'controller' => 'Captcha', 'action' => 'image'];
        $captchaDomId = uniqid('captcha');

        // captcha image
        $captchaImage = $this->_View->Html->image($captchaImageUrl, array(
            'id' => $captchaDomId,
            'class' => 'captcha-image'
        ));

        // captcha reload button
        $captchaReloadScript = sprintf("javascript:document.getElementById('%s').src='%s/' + Math.round(Math.random(0)*1000)+1; return false;",
            $captchaDomId,
            $this->_View->Html->Url->build($captchaImageUrl)
        );
        $captchaReload = $this->_View->Html->link(__('Try another image'), $captchaImageUrl, array(
            'onclick' => $captchaReloadScript,
            'href' => "javascript:void(0);"
        ));

        // captcha container
        $captchaHtml = $this->_templates->format('captcha_container', [
            'attrs' => '',
            'image' => $captchaImage,
            'reload' => $captchaReload
        ]);

        // input
        $data['type'] = 'text';
        $captchaInput = parent::render($data, $context);

        return $captchaHtml . $captchaInput;
    }

}
