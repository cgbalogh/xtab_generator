/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    if (lastcolumnheader = $('[data-lastcolumnheader]').data('lastcolumnheader')) {
        index = ($('[data-coltotal]').data('coltotal')) ? 2 : 1;
        if ($('[data-transpose]').data('transpose')) {
            $('.xtab-generator tr:nth-last-child(' + index + ') td:first-child').html(lastcolumnheader);
        } else {
            $('.xtab-generator th:nth-last-child(' + index + ') span').html(lastcolumnheader);
        }
    }
    
    $('.xtab_generator-button').button();
    $('.xtab_generator-button').css('width', '100%').css('padding', '.1em .3em');
    
    $('.xtab_generator-submit').change(function(){
        $('#xtabFilter').submit();
    });

    $('#rotateheader').change(function(){
        $('th').removeClass('xtab_generator-rotate');
        $('table.xtab-generator th').css('height', 'auto')
        $('table.xtab-generator th div').css('transform', 'none');
        if ($(this).prop('checked')) {
            maxw = maxwidth('table.xtab-generator th', false, 1);
            width = maxw + 12;
            offset = (maxw / 2) - 6;
            $('th').addClass('xtab_generator-rotate');
            $('table.xtab-generator th').css('height', width)
            $('table.xtab-generator th div').css('transform', 'translate(0px, '+ offset + 'px) rotate(270deg)');
        }
    });

    $('#rotateheader').change();

    var w = maxwidth('.col0') + 10;
    $('div.xtab-generator-wrap').css('margin-left',w);
    $('.col0').css('width',w);

    // if (maxwidth('table.xtab-generator th', true) > 1.3) {
    //    $('#rotateheader').prop('checked', true);
    //    $('#rotateheader').change();
    // }

});  


function maxwidth(selector, mode, start = 0) {
    var maxw = 0;
    var maxdiff = 0;
    var index = 0;
    $(selector).each(function(){
        if (((start > 0) && (index >= start)) || (start == 0)) {
            maxdiff = Math.max(maxdiff, Math.abs($(this).width() - maxw));
            maxw = Math.max(maxw, $(this).width());
        }
        index++;
    });
    if (mode) {
        return maxw / maxdiff;
    } else {
        return maxw;
    }
}
