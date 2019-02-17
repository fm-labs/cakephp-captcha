<?php

namespace Captcha\View\Helper;

use Cake\View\Helper;

/**
 * Class CaptchaFormHelper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 * @property \Cake\View\Helper\FormHelper $Form
 */
class CaptchaHelper extends Helper
{
    public $helpers = ['Form'];

    public function initialize(array $config)
    {
        $this->Form->addWidget('captcha', ['Captcha\View\Widget\CaptchaWidget', '_view']);
    }

    /**
     * @deprecated Use CaptchaWidget instead
     */
    public function input($field, array $config = [])
    {
        $config['type'] = 'captcha';

        return $this->Form->input($field, $config);
    }
}
