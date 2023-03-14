<?php
declare(strict_types=1);

namespace Captcha;

use Cake\Console\CommandCollection;
use Cake\Core\BasePlugin;
use Cake\Core\ContainerInterface;
use Cake\Core\PluginApplicationInterface;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\RouteBuilder;
use Captcha\Captcha\Captcha;

/**
 * Plugin for Captcha
 */
class CaptchaPlugin extends BasePlugin
{
    /**
     * Load all the plugin configuration and bootstrap logic.
     *
     * The host application is provided as an argument. This allows you to load
     * additional plugin dependencies, or attach events.
     *
     * @param \Cake\Core\PluginApplicationInterface $app The host application
     * @return void
     */
    public function bootstrap(PluginApplicationInterface $app): void
    {
        if (empty(Captcha::configured())) {
            Captcha::setConfig('securimage', [
                'className' => 'Captcha.Securimage',
//        'image_width' => 500,
//        'text_color' => '#ff9000',
//        'line_color' => '#000000',
//        'perturbation' => 0.75, // The level of distortion. 0.75 = normal, 1.0 = very high distortion
//        'num_lines' => 2, // How many lines to draw over the captcha code to increase security
//        'image_signature' => 'Foo', // The signature text to draw on the bottom corner of the image
//        'signature_color' => '#00ff00', // The color of the signature text
//        'code_length' => 5, // The length of the captcha code
//        'noise_level' => 4, // The level of noise (random dots) to place on the image, 0-10,
//        'use_transparent_text' => false, // Whether or not to draw the text transparently.
//        'text_transparency_percentage' => 100, // How transparent to make the text. 0 = completely opaque, 100 = invisible
//        'case_sensitive' => false, // Whether the captcha should be case sensitive or not. Not recommended, use only for maximum protection.
//        'use_wordlist' => false, // true to use the wordlist file, false to generate random captcha codes
            ]);
        }
    }

    /**
     * Add routes for the plugin.
     *
     * If your plugin has many routes and you would like to isolate them into a separate file,
     * you can create `$plugin/config/routes.php` and delete this method.
     *
     * @param \Cake\Routing\RouteBuilder $routes The route builder to update.
     * @return void
     */
    public function routes(RouteBuilder $routes): void
    {
        $routes->plugin('Captcha', ['path' => '/captcha'], function (\Cake\Routing\RouteBuilder $routes) {
            $routes->connect('/image/*', ['controller' => 'Captcha', 'action' => 'image']);

            if (\Cake\Core\Configure::read('debug')) {
                $routes->connect('/demo/*', ['controller' => 'Captcha', 'action' => 'demo']);
            }
            
            //$routes->fallbacks();
        });

        parent::routes($routes);
    }

    /**
     * Add middleware for the plugin.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to update.
     * @return \Cake\Http\MiddlewareQueue
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        // Add your middlewares here

        return $middlewareQueue;
    }

    /**
     * Add commands for the plugin.
     *
     * @param \Cake\Console\CommandCollection $commands The command collection to update.
     * @return \Cake\Console\CommandCollection
     */
    public function console(CommandCollection $commands): CommandCollection
    {
        // Add your commands here

        $commands = parent::console($commands);

        return $commands;
    }

    /**
     * Register application container services.
     *
     * @param \Cake\Core\ContainerInterface $container The Container to update.
     * @return void
     * @link https://book.cakephp.org/4/en/development/dependency-injection.html#dependency-injection
     */
    public function services(ContainerInterface $container): void
    {
        // Add your services here
    }
}
