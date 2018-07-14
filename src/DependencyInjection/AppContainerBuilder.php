<?php

namespace Gammabeam82\Bot\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\TaggedContainerInterface;


class AppContainerBuilder
{
    /**
     * @var TaggedContainerInterface
     */
    protected $container;

    /**
     * AppContainerBuilder constructor.
     */
    public function __construct()
    {
        $this->container = new ContainerBuilder();

        $this->compileContainer();
    }

    /**
     * @return TaggedContainerInterface
     */
    public function getContainer(): TaggedContainerInterface
    {
        return $this->container;
    }

    private function compileContainer(): void
    {
        $loader = new YamlFileLoader($this->container, new FileLocator(sprintf("%s/../../config/", __DIR__)));
        $loader->load('parameters.yaml');

        $this->container->compile(true);
    }
}
