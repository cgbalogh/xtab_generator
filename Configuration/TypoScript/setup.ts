
plugin.tx_xtabgenerator_xtab {
    view {
        templateRootPaths.0 = EXT:xtab_generator/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_xtabgenerator_xtab.view.templateRootPath}
        partialRootPaths.0 = EXT:xtab_generator/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_xtabgenerator_xtab.view.partialRootPath}
        layoutRootPaths.0 = EXT:xtab_generator/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_xtabgenerator_xtab.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_xtabgenerator_xtab.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

# these classes are only used in auto-generated templates
plugin.tx_xtabgenerator._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-xtab-generator table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-xtab-generator table th {
        font-weight:bold;
    }

    .tx-xtab-generator table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

page.includeJSFooter {
  xtabGeneratorJs = EXT:xtab_generator/Resources/Public/Scripts/xtabGenerator.js
  xtabGeneratorJs.forceOnTop = 0
}

page.includeCSS {
   xtabGeneratorCss = EXT:xtab_generator/Resources/Public/Styles/xtabGenerator.css
}
