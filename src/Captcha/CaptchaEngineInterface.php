<?php

namespace Captcha\Captcha;

/**
 * class CaptchaEngineInterface
 */
interface CaptchaEngineInterface
{
    public function getCode();

    public function validateCode($code);

    public function renderCode($code = null);
}
