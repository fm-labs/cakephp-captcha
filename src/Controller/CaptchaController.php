<?php

namespace Captcha\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Http\Exception\NotFoundException;

/**
 * CaptchaController
 *
 * @property \Captcha\Controller\Component\CaptchaComponent $Captcha
 */
class CaptchaController extends Controller
{

    public $modelClass = false;

    public $components = ['Captcha.Captcha', 'Flash'];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        if ($this->Auth) {
            $this->Auth->allow('image');
        }

        /*
        */
        $this->Captcha->setConfig('engine', [
            'className' => 'Captcha.Securimage',
            //'image_width' => 500,
            'text_color' => '#ff9000',
            'line_color' => '#000000',
            'perturbation' => 0.75, // The level of distortion. 0.75 = normal, 1.0 = very high distortion
            'num_lines' => 4, // How many lines to draw over the captcha code to increase security
            'image_signature' => 'Foo', // The signature text to draw on the bottom corner of the image
            'signature_color' => '#00ff00', // The color of the signature text
            'code_length' => 5, // The length of the captcha code
            'noise_level' => 4, // The level of noise (random dots) to place on the image, 0-10,
            'use_transparent_text' => false, // Whether or not to draw the text transparently.
            'text_transparency_percentage' => 100, // How transparent to make the text. 0 = completely opaque, 100 = invisible
            'case_sensitive' => false, // Whether the captcha should be case sensitive or not. Not recommended, use only for maximum protection.
            'use_wordlist' => false, // true to use the wordlist file, false to generate random captcha codes
        ]);
    }

    /**
     * Renders a captcha image to browser
     */
    public function image()
    {
        $this->Captcha->init();
        $this->Captcha->render();
    }

    /**
     * Demo action
     */
    public function demo()
    {
        if (!Configure::read('debug')) {
            throw new NotFoundException();
        }

        $this->Captcha->init();
        if ($this->request->is(['put', 'post'])) {
            if ($this->Captcha->validate($this->request->getData('captcha'))) {
                $this->Flash->success('Captcha code is valid');
            } else {
                $this->Flash->error('Invalid captcha code');
            }
        }
    }
}
