<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\UserLocale\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\UserLocale\Business\UserExpander\UserExpander;
use Spryker\Zed\UserLocale\Business\UserExpander\UserExpanderInterface;
use Spryker\Zed\UserLocale\Business\UserLocaleReader\UserLocaleReader;
use Spryker\Zed\UserLocale\Business\UserLocaleReader\UserLocaleReaderInterface;
use Spryker\Zed\UserLocale\Dependency\Facade\UserLocaleToLocaleFacadeBridgeInterface;
use Spryker\Zed\UserLocale\Dependency\Facade\UserLocaleToStoreFacadeInterface;
use Spryker\Zed\UserLocale\Dependency\Facade\UserLocaleToUserFacadeBridgeInterface;
use Spryker\Zed\UserLocale\UserLocaleDependencyProvider;

/**
 * @method \Spryker\Zed\UserLocale\UserLocaleConfig getConfig()
 */
class UserLocaleBusinessFactory extends AbstractBusinessFactory
{
    public function getLocaleFacade(): UserLocaleToLocaleFacadeBridgeInterface
    {
        return $this->getProvidedDependency(UserLocaleDependencyProvider::FACADE_LOCALE);
    }

    public function getUserFacade(): UserLocaleToUserFacadeBridgeInterface
    {
        return $this->getProvidedDependency(UserLocaleDependencyProvider::FACADE_USER);
    }

    public function getStoreFacade(): UserLocaleToStoreFacadeInterface
    {
        return $this->getProvidedDependency(UserLocaleDependencyProvider::FACADE_STORE);
    }

    public function createUserExpander(): UserExpanderInterface
    {
        return new UserExpander(
            $this->getLocaleFacade(),
        );
    }

    public function createUserLocaleReader(): UserLocaleReaderInterface
    {
        return new UserLocaleReader(
            $this->getUserFacade(),
            $this->getLocaleFacade(),
            $this->getStoreFacade(),
        );
    }
}
