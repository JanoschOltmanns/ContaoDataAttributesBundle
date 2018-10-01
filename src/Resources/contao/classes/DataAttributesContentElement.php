<?php

/*
 * This file is part of the contao data-attributes bundle.
 *
 * Copyright (c) 2017 Janosch Oltmanns
 *
 */

namespace JanoschOltmanns\ContaoDataAttributesBundle;


class DataAttributesContentElement {

    private function hasDataAttributes($templateData) {

        return isset($templateData['joDataAttributes']);

    }

    private function hasDisabledAutomatism($templateData) {

        return $templateData['joDataAttributesDisableAutomatic'];

    }

    private function getDataAttributesAsString($templateData) {

        $dataAttributesString = "";

        $dataAttributes = deserialize($templateData['joDataAttributes'], true);
        $parsedDataAttributes = [];

        if (sizeof($dataAttributes)>0) {

            foreach ($dataAttributes as $index=>$dataAttribute) {
                $parsedDataAttributes[] = 'data-' . str_replace('data-', '', $dataAttribute['key']) . '="' . $dataAttribute['value'] . '"';
            }
            $dataAttributesString = implode(' ' , $parsedDataAttributes);
        }

        return $dataAttributesString;

    }

    public static function getDataAttributes($templateData) {

        $dataAttributes = "";
        if (self::hasDataAttributes($templateData)) {
            $dataAttributes = self::getDataAttributesAsString($templateData);
        }

        return $dataAttributes;
    }

    public function parseTemplate($objTemplate) {

        $templateData = $objTemplate->getData();
        if ($this->hasDataAttributes($templateData) && !$this->hasDisabledAutomatism($templateData)) {
            $objTemplate->attributes = $objTemplate->attributes ? ($objTemplate->attributes . ' ' . $this->getDataAttributesAsString($templateData)): $this->getDataAttributesAsString($templateData);

        }

    }

}