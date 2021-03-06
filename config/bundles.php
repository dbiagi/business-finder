<?php declare(strict_types=1);

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class                => ['all' => true],
    Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle::class       => ['all' => true],
    Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class                 => ['all' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class     => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class                  => ['all' => true],
    Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle::class            => ['all' => true],
    Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class            => ['dev' => true, 'test' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class                          => ['all' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class                    => ['all' => true],
    Symfony\Bundle\DebugBundle\DebugBundle::class                        => ['dev' => true, 'test' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class                        => ['dev' => true],
    Symfony\Bundle\WebServerBundle\WebServerBundle::class                => ['dev' => true],
    JMS\TranslationBundle\JMSTranslationBundle::class                    => ['all' => true],
    Knp\Bundle\PaginatorBundle\KnpPaginatorBundle::class                 => ['all' => true],
    Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle::class         => ['dev' => true, 'test' => true],

    BusinessFinder\AppBundle\AppBundle::class                                  => ['all' => true],
    BusinessFinder\BlockBundle\BlockBundle::class                              => ['all' => true],
    BusinessFinder\ListingBundle\ListingBundle::class                          => ['all' => true],
    BusinessFinder\DealBundle\DealBundle::class                                => ['all' => true],
    BusinessFinder\EventBundle\EventBundle::class                              => ['all' => true],
    BusinessFinder\SearchBundle\SearchBundle::class                            => ['all' => true],
    Hautelook\AliceBundle\HautelookAliceBundle::class                          => ['dev' => true],
    Fidry\AliceDataFixtures\Bridge\Symfony\FidryAliceDataFixturesBundle::class => ['dev' => true],
    Nelmio\Alice\Bridge\Symfony\NelmioAliceBundle::class                       => ['dev' => true],
];
