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

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class AccountDataFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('test', TextType::class,                 [
                'constraints' => [
                    new NotBlank(['message' => 'Required!']),
                ],
            ])
            ->add(
                'platforms',
                ChoiceType::class,
                [
                    'choices' => [
                        $options['platforms'],
                    ],
                    'choice_value' => static function (?Platform $platform = null): string {
                        return null !== $platform ? $platform->getKey() : '';
                    },
                    'multiple'        => true,
                    'invalid_message' => 'Invalid Platform selected',
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setRequired(['platforms']);
    }
}
