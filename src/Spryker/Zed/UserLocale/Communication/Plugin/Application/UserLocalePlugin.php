<?php
/**
 * Created by PhpStorm.
 * User: devromans
 * Date: 2019-02-06
 * Time: 13:31
 */

namespace Spryker\Zed\UserLocale\Communication\Plugin\Application;


use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface;
use Spryker\Shared\ApplicationExtension\Dependency\Plugin\BootableApplicationPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Spryker\Zed\UserLocale\Communication\UserLocaleCommunicationFactory getFactory()
 * @method \Spryker\Zed\UserLocale\UserLocaleConfig getConfig()
 * @method \Spryker\Zed\UserLocale\Business\UserLocaleFacadeInterface getFacade()
 */
class UserLocalePlugin extends AbstractPlugin implements ApplicationPluginInterface, BootableApplicationPluginInterface
{
    /**
     * {@inheritdoc}
     * - Replaces default Application locale with User Locale.
     *
     * @api
     *
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Spryker\Service\Container\ContainerInterface
     */
    public function boot(ContainerInterface $container): ContainerInterface
    {
        $userLocaleName = $this->getCurrentUserLocaleCode() ?: $this->getConfig()->getDefaultLocaleName();

        $container->remove('locale');
        $container->set('locale', $userLocaleName);

        return $container;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Spryker\Service\Container\ContainerInterface
     */
    public function provide(ContainerInterface $container): ContainerInterface
    {
        return $container;
    }

    /**
     * @return string|null
     */
    protected function getCurrentUserLocaleCode(): ?string
    {
        if (!$this->getFactory()->getUserFacade()->hasCurrentUser()) {
            return null;
        }

        return $this->getFactory()->getUserFacade()->getCurrentUser()->getLocaleName();
    }
}
