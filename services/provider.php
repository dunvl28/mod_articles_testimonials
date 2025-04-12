<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_testimonial
 *
 * @copyright   (C) 2025 ThomasNguyen - nguyenvuledu@gmail.com
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Extension\Service\Provider\HelperFactory;
use Joomla\CMS\Extension\Service\Provider\Module;
use Joomla\CMS\Extension\Service\Provider\ModuleDispatcherFactory;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

/**
 * The article testimonial module service provider.
 *
 * @since  1.0.0
 */
return new class () implements ServiceProviderInterface {
    /**
     * Registers the service provider with a DI container.
     *
     * @param   Container  $container  The DI container.
     *
     * @return  void
     *
     * @since   1.0.0
     */
    public function register(Container $container)
    {
        $container->registerServiceProvider(new ModuleDispatcherFactory('\\Joomla\\Module\\ArticlesTestimonial'));
        $container->registerServiceProvider(new HelperFactory('\\Joomla\\Module\\ArticlesTestimonial\\Site\\Helper'));

        $container->registerServiceProvider(new Module());
    }
};
