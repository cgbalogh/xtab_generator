<?php
namespace CGB\XtabGenerator\UserFunc;


/**
* Class FlexFormUserFunc
*/
class FlexFormUserFunc {
 
    
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapFactory
     * @inject 
     */
    protected $dataMapFactory;
    
    
    /**
    * @param array $fConfig
     * 
     * this method reads the autoregistered classes from
    *
    * @return void
    */
    public function getClasses(&$fConfig) {
        // select only autoregistered classes from the following vendors
        $vendorList = array_unique(\TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $fConfig['row']['settings.datatables.vendorList'], 1));
        
        // get autoloaded classes from autoloader cached classmap
        if ( file_exists(PATH_site.'typo3temp/autoload/autoload_classmap.php')) {
            // for Typo3 7.6.x
            $classes = include PATH_site.'typo3temp/autoload/autoload_classmap.php';
        } elseif ( file_exists(PATH_site.'typo3conf/autoload/autoload_classmap.php')) {
            // for Typo3 8.x.x
            $classes = include PATH_site.'typo3conf/autoload/autoload_classmap.php';
        } else {
            $classes = [];
        }
        
        // add empyt selection to item list
        array_push($fConfig['items'], array('',''));
        
        
        // 
        // cycle all classes and add to item list if class name containes \Domain\Model
        //
        foreach($classes as $classname => $location) {
            // if no vendor is given, all classes will be listed
            if ($fConfig['row']['settings.datatables.vendorList'] == '') {
                if (strpos($classname, '\\Domain\\Repository\\') !== false) {
                    $classname = str_replace('\\Repository\\', '\\Model\\', $classname);
                    $classname = str_replace('Repository', '', $classname);
                    array_push($fConfig['items'], array($classname,$classname));
                }
            } else {
                foreach ($vendorList as $vendor) {
                    if (\TYPO3\CMS\Core\Utility\GeneralUtility::isFirstPartOfStr($classname, $vendor . '\\')) {
                        if ((strpos($classname, 'Domain\\Repository')) && (strpos($classname, '\\Domain\\Repository\\') !== false)) {
                            $classname = str_replace('\\Repository\\', '\\Model\\', $classname);
                            $classname = str_replace('Repository', '', $classname);
                            array_push($fConfig['items'], array($classname,$classname));
                        }
                    }
                }
            }
        }
    }

    
    /**
    * @param array $fConfig
    *
    * @return void
    */
    public function getSubClasses(&$fConfig) {
        if (($class = $fConfig['row']['settings.xtab.aggregateObject'])) {
            \array_push($fConfig['items'], array('',''));
            \array_push($fConfig['items'], array($class,'uid'));
            print_r($class);
            if (is_array($class)) $class = $class[0];
            $obj = new $class;
            $properties = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getGettablePropertyNames($obj);
            foreach ($properties as $property) {
                $reflection = new \TYPO3\CMS\Extbase\Reflection\PropertyReflection($obj, $property);
                if ($reflection->isTaggedWith('var')) {
                    $type = $reflection->getTagValues('var');
                    if (! \TYPO3\CMS\Core\Utility\GeneralUtility::inList('string,int,integer,boolean,DateTime,\\DateTime', $type[0])) {
                        \array_push($fConfig['items'], array(
                            $property . " ({$type[0]})",
                            $property
                        ));
                    }
                }
            }
        }
    }
    
}