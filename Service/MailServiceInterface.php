<?php

namespace Modera\BackendSecurityBundle\Service;

use Modera\SecurityBundle\Entity\User;

/**
 * @deprecated Since 2.56.0, use \Modera\SecurityBundle\PasswordStrength\Mail\MailServiceInterface instead.
 *
 * @author    Stas Chychkan <stas.chichkan@modera.net>
 * @copyright 2015 Modera Foundation
 */
interface MailServiceInterface
{
    /**
     * @param User $user
     * @param $plainPassword
     *
     * @return array|bool
     */
    public function sendPassword(User $user, $plainPassword);
}
