<?php

/*
 * This file is part of contao article classes bundle.
 *
 * (c) Janosch Oltmanns
 *
 * @license LGPL-3.0-or-later
 */

namespace JanoschOltmanns\ContaoDataAttributesBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use JanoschOltmanns\ContaoDataAttributesBundle\JanoschOltmannsContaoDataAttributesBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(JanoschOltmannsContaoDataAttributesBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
