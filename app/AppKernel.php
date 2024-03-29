<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel {

    public function registerBundles() {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),


            new Celmedia\PortalBundle\CelmediaPortalBundle(),
            

            // Add your dependencies
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),

            // new Sonata\jQueryBundle\SonatajQueryBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            //...
            // If you haven't already, add the storage bundle
            // This example uses SonataDoctrineORMAdmin but
            // it works the same with the alternatives
            // new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            // Then add SonataAdminBundle
            new Sonata\AdminBundle\SonataAdminBundle(),
//            new BeSimple\SoapBundle\BeSimpleSoapBundle(),
//            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
//            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),

            new Celmedia\CrmCanjeadorCodigosBundle\CelmediaCrmCanjeadorCodigosBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new BeSimple\SoapBundle\BeSimpleSoapBundle(),

            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),

            new Sonata\IntlBundle\SonataIntlBundle(),
            new Sonata\MediaBundle\SonataMediaBundle(),
            new Application\Sonata\MediaBundle\ApplicationSonataMediaBundle(),


            // new Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle(),
            // new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            // new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            // new Craue\FormFlowBundle\CraueFormFlowBundle(),
        // ...
            new Braincrafted\Bundle\BootstrapBundle\BraincraftedBootstrapBundle(),

            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Celmedia\AdminThemeBundle\CelmediaAdminThemeBundle(),
            // new Genemu\Bundle\FormBundle\GenemuFormBundle(),


            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),

            );

if (in_array($this->getEnvironment(), array('dev', 'test'))) {
//            $bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
    $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
    $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
    $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
}

return $bundles;
}

public function registerContainerConfiguration(LoaderInterface $loader) {
    $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
}

}
