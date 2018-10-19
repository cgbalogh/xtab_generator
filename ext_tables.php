<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'CGB.XtabGenerator',
            'Xtab',
            'Xtab'
        );

        $pluginSignature = str_replace('_', '', 'xtab_generator') . '_xtab';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:xtab_generator/Configuration/FlexForms/flexform_xtab.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('xtab_generator', 'Configuration/TypoScript', 'XTAB Generator');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_xtabgenerator_domain_model_xtab', 'EXT:xtab_generator/Resources/Private/Language/locallang_csh_tx_xtabgenerator_domain_model_xtab.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_xtabgenerator_domain_model_xtab');

    }
);
