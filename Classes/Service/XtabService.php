<?php
namespace CGB\XtabGenerator\Service;

/***************************************************************
*  Copyright notice
*
*  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General protected License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General protected License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General protected License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * An xtab service
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU protected License, version 2
 */
class xtabService implements \TYPO3\CMS\Core\SingletonInterface {

    
    /**
     * 
     * @param array $data
     * @param bool $rowTotal
     * @param bool $colTotal
     * @param bool $transpose
     * @return array
     */
    public function arrayToMatrix ( $data = [], $rowTotal = false, $colTotal = false, $transpose = false) {
        $table = [];

        // initialize left upper cell with nothing
        $table[0][0] = '';
        $colSum = [];
        $rowSum = [];
        $rowHeaderArray = [];
        
        // get header rows
        // needs to be done separately because of the reverse order option
        foreach($data as $row) {
            // if value is '*' this is interpreted as colheader cell
            $rowheader = $row['rowheader'];
            $colheader = $row['colheader'];
            $value = $row['value'];
                    
            // echo "$rowheader $colheader $value <br />";
            // print_r($table);
            if (($value == '*') || ($value == -999999999)) {
                // set colheader in row 0
                $table[0][$colheader] = $colheader;
            }
        }
        
        
        // cycle rows
        foreach($data as $row) {
            // if value is '*' this is interpreted as colheader cell
            $rowheader = $row['rowheader'];
            $colheader = $row['colheader'];
            $value = $row['value'];
                    
            // echo "$rowheader $colheader $value <br />";
            // print_r($table);
            if (($value == '*') || ($value == -999999999)) {
                // set colheader in row 0
                // $table[0][$colheader] = $colheader; skip;
            } else {
                // check if row is already initialized
                if (! isset($table[$rowheader][0])) {
                    // initalize row with all values from header row
                    foreach($table[0] as $key => $header) {
                        $table[$rowheader][$key] = '';
                        $rowHeaderArray[$rowheader] = $rowheader;
                    }
                    
                    // initialize rowheader with rowheader value
                    $table[$rowheader][0] = $rowheader;
                }
                
                // set cell value
                $table[$row['rowheader']][$colheader] = $value;
                $rowSum[$rowheader] += $value;
                $colSum[$colheader] += $value;
            }
        }
        
        $allTotal = 0;
        if ($colTotal) {
            $table[0]['Total'] = 'Ʃ';
            foreach ($rowHeaderArray as $rowheader) {
                $table[$rowheader]['Total'] = $rowSum[$rowheader];
            }
        }

        if ($rowTotal) {
            $table['Total'][0] = 'Ʃ';
            foreach ($table[0] as $key => $colheader) {
                $table['Total'][$key] = $colSum[$key];
                $allTotal += $colSum[$key];
            }
            $table['Total'][0] = 'Ʃ';
        }

        if ($colTotal && $rowTotal) {
            $table['Total']['Total'] = $allTotal;
        }
        
        if ($transpose) {
            $table = self::transpose($table);
        }
        
        return $table;
    }
    
    /**
     * 
     * @param array $array
     */
    static function transpose($array) {
        $transposedTable = [];
        foreach ($array as $rowheader => $rowvalues) {
            foreach($rowvalues as $colheader => $cell) {
                $transposedTable[$colheader][$rowheader] = $cell;
            }
        }
        return $transposedTable;
    }

    /**
     * 
     * @param type $body
     * @param type $header
     * @param type $footer
     */
    public function arrayToTable ( $body = [], $header = [], $footer = []) {
        
        // render table to html table
        
        $bodyHtml = '<tbody>';
        
        foreach($body as $row) {
            $openingRowTag = '<tr>';
            $closingRowTag = '</tr>';
        
            $rowData = '';
            foreach($row as $col) {
                $openingTag = '<td';
                $closingTag = '</td>';
                if (is_array($col)) {
                    // element contains other tags too
                    $openingTag .= '>';
                    $element = $col['td'];
                } else {
                    // element is td content
                    $openingTag .= '>';
                    $element = $col;
                }
                $rowData .= $openingTag . $element . $closingTag;
            }
            
            $row = $openingRowTag . $rowData . $closingRowTag;
            $bodyHtml .= $row;
        }
            
        $bodyHtml .= '</tbody>';
        $table = '<table>' . $bodyHtml . '</table>';
        return $table;
    }
	
}

?>