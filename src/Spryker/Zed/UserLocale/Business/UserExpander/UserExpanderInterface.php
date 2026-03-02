<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\UserLocale\Business\UserExpander;

use Generated\Shared\Transfer\UserCollectionTransfer;
use Generated\Shared\Transfer\UserTransfer;

interface UserExpanderInterface
{
    public function expandUserTransferWithLocale(UserTransfer $userTransfer): UserTransfer;

    public function expandUserCollectionWithLocale(UserCollectionTransfer $userCollectionTransfer): UserCollectionTransfer;
}
