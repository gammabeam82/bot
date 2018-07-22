<?php

namespace Gammabeam82\Bot\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder as SymfonyContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\TaggedContainerInterface;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;


class ContainerBuilder
{
    /**
     * @var TaggedContainerInterface
     */
    protected static $container;

    /**
     * @return TaggedContainerInterface
     */
    public static function getContainer(): TaggedContainerInterface
    {
        if (false !== self::$container instanceof TaggedContainerInterface) {
            return self::$container;
        }

        $container = new SymfonyContainerBuilder();
        $container->addCompilerPass(new RegisterListenersPass());

        $loader = new YamlFileLoader($container, new FileLocator(sprintf("%s/../../config/", __DIR__)));
        $loader->load('parameters.yaml');

        $container->compile(true);
        self::$container = $container;

        return $container;
    }
}
