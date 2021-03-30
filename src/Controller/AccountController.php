<?php

declare(strict_types=1);

/*
 * This file is part of Alzura.
 *
 * (c) Saitow AG <https://www.saitow.ag>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Form\AccountDataFormType;
use App\Form\Data;
use App\Form\Platform;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends AbstractController
{
    public function createAccount(): Response
    {
        $platforms = [];
        $platform = new Platform();
        $platform->setId(1);
        $platform->setKey('First');
        $platforms[] = $platform;
        $platform = new Platform();
        $platform->setId(2);
        $platform->setKey('Second');
        $platforms[] = $platform;

        $accountData = new Data();
        $form = $this->createForm(AccountDataFormType::class, $accountData, [
            'platforms' => $platforms,
        ]);

        $form->submit([
            'test' => 'Test',
            'platforms' => ['Other'],
        ]);

        if (!$form->isValid()) {
            dd('Form Invalid', (string) $form->getErrors(true, false));
        }

        dd('Success');
    }
}
