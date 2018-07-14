<?php

namespace Gammabeam82\Bot\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\TaggedContainerInterface;


class AppContainerBuilder
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var TaggedContainerInterface
     */
    protected $container;

    /**
     * AppContainerBuilder constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->container = new ContainerBuilder();

        $this->configure();
    }

    /**
     * @return TaggedContainerInterface
     */
    public function getContainer(): TaggedContainerInterface
    {
        return $this->container;
    }

    private function configure(): void
    {
        $loader = new YamlFileLoader($this->container, new FileLocator(sprintf("%s/../../config/", __DIR__)));
        $loader->load('parameters.yaml');
    }
}
