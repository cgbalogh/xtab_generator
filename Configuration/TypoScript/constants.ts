
plugin.tx_xtabgenerator_xtab {
    view {
        # cat=plugin.tx_xtabgenerator_xtab/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:xtab_generator/Resources/Private/Templates/
        # cat=plugin.tx_xtabgenerator_xtab/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:xtab_generator/Resources/Private/Partials/
        # cat=plugin.tx_xtabgenerator_xtab/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:xtab_generator/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_xtabgenerator_xtab//a; type=string; label=Default storage PID
        storagePid =
    }
}
