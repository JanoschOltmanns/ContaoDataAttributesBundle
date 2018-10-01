<?php

/*
 * This file is part of the contao data-attributes bundle.
 *
 * Copyright (c) 2017 Janosch Oltmanns
 *
 */

/*
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('JanoschOltmanns\\ContaoDataAttributesBundle\\DataAttributesContentElement', 'parseTemplate');
