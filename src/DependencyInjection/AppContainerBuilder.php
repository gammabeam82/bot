<?php

namespace Gammabeam82\Bot\DependencyInjection;

use Gammabeam82\Bot\Message\MessagePartsLoader;
use Gammabeam82\Bot\Message\MessageProvider;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
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
        $this->container->setParameter('parts', $this->config['parts']);

        $this->container
            ->register('loader', MessagePartsLoader::class)
            ->addArgument('%parts%');

        $this->container
            ->register('message_provider', MessageProvider::class)
            ->addArgument(new Reference('loader'));
    }
}
