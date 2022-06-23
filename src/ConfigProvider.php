<?php

declare(strict_types=1);

namespace Ruga\Dialog;


/**
 * ConfigProvider.
 *
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * @see      https://docs.mezzio.dev/mezzio/v3/features/container/config/
 */
class ConfigProvider
{
    public function __invoke()
    {
        return [
            //@todo This is currently ignored
            Dialog::class => [
                Dialog::CONF_TEMPLATE => 'layout::ruga-dialog',
            ],
            'templates' => [
                'paths' => [
                    'layout' => [__DIR__ . '/../templates/layout'],
                ]
            ],
            'dependencies' => [
                'services' => [],
                'aliases' => [],
                'factories' => [],
                'invokables' => [],
                'delegators' => [],
            ],
        ];
    }
}
