<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\UserLocale\Business;

interface UserLocaleFacadeInterface
{
    /**
     * Specification:
     * - Executes required actions on install.
     *
     * @api
     *
     * @return void
     */
    public function install(): void;
}
