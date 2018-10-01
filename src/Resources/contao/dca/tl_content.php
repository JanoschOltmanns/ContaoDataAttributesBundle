<?php

/*
 * This file is part of the contao data-attributes bundle.
 *
 * Copyright (c) 2017 Janosch Oltmanns
 *
 */


foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $k => $palette)
{

    if (!is_array($palette) && strpos($palette, "cssID") !== false)
    {
        $GLOBALS['TL_DCA']['tl_content']['palettes'][$k] = str_replace
        (
            '{invisible_legend',
            '{jo_data-attributes_legend},joDataAttributes,joDataAttributesDisableAutomatic;{invisible_legend',
            $GLOBALS['TL_DCA']['tl_content']['palettes'][$k]
        );
    }

}

$GLOBALS['TL_DCA']['tl_content']['fields']['joDataAttributes'] = [
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['joDataAttributes'],
    'inputType'               => 'keyValueWizard',
    'exclude'                 => true,
    'sql'                     => "text NULL"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['joDataAttributesDisableAutomatic'] = [
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['joDataAttributesDisableAutomatic'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('submitOnChange'=>false, 'tl_class'=>'clr m12'),
    'sql'                     => "char(1) NOT NULL default ''"
];
