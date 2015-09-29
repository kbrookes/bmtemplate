<?php
/**
 * ------------------------------------------------------------------------
 * JA K2 v3 Filter Module for J33
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */

// No direct access.
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip', '.ja-k2filter-tip', array('hideDelay'=>1500, 'fixed'=>true, 'className' => 'jak2-tooltip'));
$app = JFactory::getApplication();
$formid = 'jak2filter-form-'.$module->id;
$itemid = $params->get('set_itemid',0)?$params->get('set_itemid',0): $app->input->getInt('Itemid');
$ajax_filter = $params->get('ajax_filter', 0);
$share_url = $params->get('share_url_of_results_page', 0);
?>
<div class="k2SearchBlock">
<form id="<?php echo $formid; ?>" name="<?php echo $formid; ?>" method="POST"
      action="<?php echo JRoute::_('index.php?option=com_jak2filter&view=itemlist&Itemid='.$itemid); ?>">
<input type="hidden" name="task" value="search" />
<input type="hidden" name="swr" value="<?php echo $slider_whole_range; ?>" />
<?php if(!empty($theme)): ?>
    <input type="hidden" name="theme" value="<?php echo $theme ?>" />
<?php endif; ?>
<?php if($catMode): ?>
    <!-- include sub category -->
    <input type="hidden" name="isc" value="1" />
<?php endif; ?>
<?php if(!$params->get('display_ordering_box', 1) && $params->get('catOrdering') != "inherit"): ?>
    <input type="hidden" id="ordering" name="ordering" value="<?php echo $params->get('catOrdering'); ?>" />
<?php endif; ?>
<?php if(!$filter_by_category): ?>
    <?php echo $categories; ?>
<?php endif; ?>
<div id="jak2filter<?php echo $module->id; ?>" class="ja-k2filter <?php echo $ja_stylesheet;?>">
<?php
$j = 0;
$clear = '';
$style = '';

/*BEGIN: filter by Keyword*/
if($filter_by_keyword):
    if($params->get('ja_column') >0 && (($j) % $params->get('ja_column')) == 0){
        $clear = " clear:both;";
    }
    if($ja_column || $clear){
        $style ='style="'.$ja_column.$clear.'"';
    }
    $j++;

    ?>

       
        <input type="text" name="searchword" id="searchword<?php echo $module->id; ?>" class="inputbox searchInput"
               value="<?php echo htmlspecialchars($app->input->getString('searchword',''));?>"
               placeholder="<?php echo JText::_('SEARCH_BY_KEYWORD', ''); ?>"
            />
        <?php if($filter_keyword_option): ?>
            <p class="keyword-options">
                <?php echo $keyword_option;?>
            </p>
        <?php else: ?>
            <!--<input type="hidden" name="st" value="<?php /*echo $keyword_default_mode; */?>" />-->
        <?php endif; ?>
    
    <?php
    $clear = '';
endif;
/*END: filter by Keyword*/
?>
<?php
/*BEGIN: filter by date*/
if($filter_by_daterange):
    $style = '';
    if($params->get('ja_column') >0 && (($j) % $params->get('ja_column')) == 0){
        $clear = " clear:both;";
    }
    if($ja_column || $clear){
        $style ='style="'.$ja_column.$clear.'"';
    }
    $j++;
    ?>
    <li <?php echo $style;?>>
        <label class="group-label"><?php echo JText::_('SEARCH_BY_DATE'); ?></label>
        <?php echo $filter_by_daterange; ?>
    </li>
<?php endif; ?>

<?php
/*BEGIN: filter by Author*/
if($filter_by_author):
    $style = '';
    if($params->get('ja_column') >0 && (($j) % $params->get('ja_column')) == 0){
        $clear = " clear:both;";
    }
    if($ja_column || $clear){
        $style ='style="'.$ja_column.$clear.'"';
    }
    $j++;

    ?>
    <li <?php echo $style;?>>
        <?php echo $authors_label; ?>
        <?php echo $authors; ?>
    </li>
    <?php
    $clear = '';
endif;
/*END: filter by Author*/
?>

<?php
/*BEGIN: filter by Tags*/
if($filter_by_tags_display):
    $style = '';
    if($params->get('ja_column') >0 && (($j) % $params->get('ja_column')) == 0){
        $clear = " clear:both;";
    }
    if($ja_column || $clear){
        $style ='style="'.$ja_column.$clear.'"';
    }
    $j++;

    ?>
    <li <?php echo $style;?>>
        <label class="group-label"><?php echo $filter_by_tags_label; ?></label>
        <?php echo $filter_by_tags_display; ?>
    </li>
    <?php
    $clear = '';
endif;
/*END: filter by Tags*/
?>

<?php
/*BEGIN: filter by Rating*/
if($filter_by_rating_display):
    $style = '';
    if($params->get('ja_column') >0 && (($j) % $params->get('ja_column')) == 0){
        $clear = " clear:both;";
    }
    if($ja_column || $clear){
        $style ='style="'.$ja_column.$clear.'"';
    }
    $j++;

    ?>
    <li <?php echo $style;?>>
        <label class="group-label">
            <?php echo JText::_('JAK2_RATING'); ?>
            <ul class="itemRatingList" id="rating_range_<?php echo $module->id; ?>">
                <li style="width:53.4%;" id="presenter_<?php echo $module->id; ?>_rating" class="itemCurrentRating"></li>
                <li><span class="srange one-star" title="" rel="1-stars" href="#">1</span></li>
                <li><span class="srange two-stars" title="" rel="2-stars" href="#">2</span></li>
                <li><span class="srange three-stars" title="" rel="3-stars" href="#">3</span></li>
                <li><span class="srange four-stars" title="" rel="4-stars" href="#">4</span></li>
                <li><span class="srange five-stars" title="" rel="5-stars" href="#">5</span></li>
            </ul>
            <span id="presenter_<?php echo $module->id; ?>_rating_note" class="itemCurrentRatingNote"></span>
        </label>
        <?php echo $filter_by_rating_display; ?>
    </li>
    <?php
    $clear = '';
endif;
/*END: filter by Rating*/
?>

<?php
/*BEGIN: filter by Category*/
if($filter_by_category){
    $style = '';
    if($params->get('ja_column') >0 && (($j) % $params->get('ja_column')) == 0){
        $clear = " clear:both;";
    }
    if($ja_column || $clear){
        $style ='style="'.$ja_column.$clear.'"';
    }
    $j++;
    ?>
    <li <?php echo $style;?>>
        <label class="group-label"><?php echo JText::_('JAK2_CATEGORY'); ?></label>
        <?php echo $categories; ?>
    </li>
    <?php
    $clear = '';
}

/*END: filter by Category*/
?>

<?php if($list): ?>
    <?php if($ja_stylesheet == 'vertical-layout' && count($list) > 1): ?>
    <li id="ja-extra-field-accordion-<?php echo $module->id; ?>" class="accordion">
        <?php foreach($list as $glist): ?>
            <?php $groupid = $glist['groupid']; ?>
            <h4 class="heading-group heading-group-<?php echo $groupid ?>"><?php echo $glist['group'] ?></h4>
            <div>
                <ul>
                    <?php require JModuleHelper::getLayoutPath('mod_jak2filter', 'default_extrafields'); ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </li>
<?php else: ?>
    <?php foreach($list as $glist): ?>
        <?php require JModuleHelper::getLayoutPath('mod_jak2filter', 'default_extrafields'); ?>
    <?php endforeach; ?>
<?php endif; ?>


<?php if($ja_stylesheet == 'vertical-layout' && count($list) > 1): ?>
    <script type="text/javascript">
        /*<![CDATA[*/
        (function($){
            $(document).ready(function(){
                $( "#jak2filter<?php echo $module->id;?> .accordion" ).accordion({
                    header: " > h4",
                    autoHeight: false,
                    collapsible: true,
                    icons: {
                        header: "collapsed",
                        headerSelected: "expanded"
                    }
                });
            });
        })(jQuery);
        /*]]>*/
    </script>
<?php endif; ?>
<?php endif; ?>

<?php if ($params->get('display_ordering_box', 1)): ?>
    <?php
    $style = '';
    if($params->get('ja_column') >0 && (($j) % $params->get('ja_column')) == 0){
        $clear = " clear:both;";
    }
    if($ja_column || $clear){
        $style ='style="'.$ja_column.$clear.'"';
    }
    $j++;
    ?>
    <li <?php echo $style; ?>>
        <label for="catOrderingSelectBox" class="group-label"><?php echo JText::_('JAK2_ITEM_ORDERING_SELECT_BOX'); ?></label>
        <?php echo $display_ordering; ?>
    </li>
<?php endif; ?>

<?php
$style='';
if($params->get('ja_column') >0 && (($j) % $params->get('ja_column')) == 0){
    $clear = " clear:both;";
}
if($ja_column || $clear){
    $style ='style="'.$ja_column.$clear.'"';
}
$j++;
?>

    <?php if($params->get('auto_filter',1) == 0): ?>
        <input class="button searchSubmit" type="submit" name="btnSubmit" value="&#xf002;" />
    <?php endif; ?>
    <?php if($params->get('enable_reset_button',1) == 1): ?>
        <input class="btn" type="button" name="btnReset" value="<?php echo JText::_('RESET'); ?>" onclick="jaK2Filter.form.reset('<?php echo $module->id;?>', '<?php echo $formid; ?>', true);" />
    <?php endif; ?>
    <?php if($ajax_filter && $share_url): ?>
        <div class="jak2shareurl"><a href="<?php echo JUri::current() ?>" target="_blank" title="<?php echo JText::_('JAK2_SHARE_URL_OF_RESULTS_PAGE_DESC', true)?>"><?php echo JText::_('JAK2_SHARE_URL_OF_RESULTS_PAGE')?></a></div>
    <?php endif; ?>


<?php
$clear = '';
?>
</div>
<?php if($params->get('ajax_filter', 0) == 1): ?>
    <input type="hidden" name="tmpl" value="component"/>
<?php endif; ?>
</form>
</div>

<script type="text/javascript">
    /*<![CDATA[*/

    //validate date function
    function isDate(txtDate){
        var reg = /^(\d{4})([\/-])(\d{1,2})\2(\d{1,2})$/;
        return reg.test(txtDate);
    }

    //validate startdate and enddate before submit form
    function validateDateRange(obj){
        if(obj.id == 'sdate_<?php echo $module->id; ?>' || obj.id == 'edate_<?php echo $module->id; ?>'){
            var sDate = jQuery('#jak2filter<?php echo $module->id;?>').find('#sdate_<?php echo $module->id; ?>').val();
            var eDate = jQuery('#jak2filter<?php echo $module->id;?>').find('#edate_<?php echo $module->id; ?>').val();
            if(sDate != '' && eDate != ''){
                if(isDate(sDate) && isDate(eDate)){
                    obj.removeClass('date-error');
                    jQuery('#<?php echo $formid; ?>').submit();
                }
                else{
                    obj.addClass('date-error');
                }
            }
        }
        else{
            jQuery('#<?php echo $formid; ?>').submit();
        }
    }

    (function($){
        $(document).ready(function(){
            var formid 		= '<?php echo $formid; ?>';
            var moduleid 	= <?php echo (int) $module->id; ?>;
            var uri 		= '<?php echo JUri::root(true).'/'; ?>';
            var jaform 		= $('#'+formid);
            var container 	= $('#jak2filter'+moduleid);

            if(container.find('#category_id').length){
                jaK2Filter.form.changeCategory(moduleid, container.find('#category_id'), <?php echo is_array($selected_group) ? implode(',', $selected_group): $selected_group; ?>);
            }

            <?php if($auto_filter): ?>
            jaform.find('input').each(function() {
                $(this).on('change', function(){
                    if(this.id == 'sdate_'+moduleid || this.id == 'edate_'+moduleid){
                        var sDate = container.find('#sdate_'+moduleid).attr('value');
                        var eDate = container.find('#edate_'+moduleid).attr('value');
                        if(sDate != '' && eDate != ''){
                            if(isDate(sDate) && isDate(eDate)){
                                this.removeClass('date-error');
                                jaform.fireEvent('submit');
                            }
                            else{
                                this.addClass('date-error');
                            }
                        }
                    }
                    else{
                        jaform.trigger('submit');
                    }

                });
            });
            jaform.find('select').each(function() {
                $(this).on('change', function(){
                    if(this.id == 'dtrange' && this.value == 'range'){
                        var sDate = container.find('#sdate_'+moduleid);
                        var eDate = container.find('#edate_'+moduleid);
                        if(sDate.attr('value') != '' && eDate.attr('value') != ''){
                            var isStartDate = isDate(sDate.attr('value'));
                            var isEndDate = isDate(eDate.attr('value'));
                            if(isStartDate && isEndDate){
                                jaform.fireEvent('submit');
                            }
                            else{
                                if(!isStartDate)
                                    sDate.addClass('date-error');
                                if(!isEndDate)
                                    eDate.addClass('date-error');
                            }
                        }
                    }
                    else{
                        jaform.trigger('submit');
                    }
                });
            });
            jaform.find('textarea').each(function(el) {
                $(this).on('change', function(){
                    jaform.trigger('submit');
                });
            });
            <?php endif; ?>

            <?php if($ajax_filter): ?>
            jaform.on('submit', function() {
                jaK2Filter.ajax.submit(this, uri);
                <?php if($share_url): ?>
                jaK2Filter.ajax.shareUrl(this);
                <?php endif; ?>
                return false;
            });
            jaform.on('submit', function(event) {
                event.preventDefault();
                jaK2Filter.ajax.submit(this, uri);
                <?php if($share_url): ?>
                jaK2Filter.ajax.shareUrl(this);
                <?php endif; ?>
            });
            if($('#k2Container')) {
                jaK2Filter.ajax.paging($('#k2Container'), uri);
                <?php if($share_url): ?>
                jaK2Filter.ajax.shareUrl(this);
                <?php endif; ?>
            }
            <?php endif; ?>
        });
    })(jQuery);
    /*]]>*/
</script>