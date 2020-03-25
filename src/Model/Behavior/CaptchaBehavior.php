<?php

namespace Captcha\Model\Behavior;

use Cake\ORM\Behavior;

class CaptchaBehavior extends Behavior
{

    public function initialize(array $config): void
    {
    }

    /*
    public function beforeValidate(Model $model) {
        foreach ($this->settings[$model->alias] as $field => $_config) {
            if (is_numeric($field)) {
                $field = $_config;
                $_config = array();
            }
            $this->setupField($model, $field, $_config);
        }
    }

    public function setupField(Model $model, $field, $config) {
        $model->getValidator()
            ->add($field, 'captchaNotEmpty', array(
                'rule' => 'notEmptyString',
                'message' => __('Please enter the captcha code')
            ))
            ->add($field, 'captchaValidate', array(
                'rule' => array('validateCaptcha'),
                'message' => __('Captcha code not valid')
            ));
    }

    public function validateCaptcha(Model $model, $check) {
        $value = array_values($check);
        $value = $value[0];

        return CakeSecurimage::staticValidate($value);
    }
    */
}
