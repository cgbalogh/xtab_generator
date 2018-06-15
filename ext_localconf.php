<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CGB.XtabGenerator',
            'Xtab',
            [
                'Xtab' => 'basic, xtab'
            ],
            // non-cacheable actions
            [
                'Xtab' => 'basic, xtab'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    xtab {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('xtab_generator') . 'Resources/Public/Icons/user_plugin_xtab.svg
                        title = LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtab_generator_domain_model_xtab
                        description = LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtab_generator_domain_model_xtab.description
                        tt_content_defValues {
                            CType = list
                            list_type = xtabgenerator_xtab
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript('datatables', 'setup', 'config.tx_extbase.features.requireCHashArgumentForActionArguments = 0', 1);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
  'xtab_generator-icon',
  \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
  ['source' => 'EXT:xtab_generator/Resources/Public/Icons/xtab_generator-icon.png']
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
        wizards.newContentElement.wizardItems.plugins {
            elements {
                xtab {
                    icon >
                    iconIdentifier = xtab_generator-icon
                    title = LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtabgenerator_domain_model_xtabgenerator.ce
                    description = LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtabgenerator_domain_model_xtabgenerator.description.ce
                    tt_content_defValues {
                        CType = list
                        list_type = xtabgenerator_xtab
                    }
                }
            }
            show = *
        }
   }'
);