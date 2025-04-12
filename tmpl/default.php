<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_testimonial
 *
 * @copyright   (C) 2025 ThomasNguyen - nguyenvuledu@gmail.com
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\Component\Fields\Administrator\Helper\FieldsHelper;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Uri\Uri;

$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->useScript('jquery');
$wa->registerAndUseStyle('TestimonialCss',Uri::root() . 'media/mod_articles_testimonial/css/css.css');
$wa->registerAndUseScript('TestimonialJs', Uri::root() . 'media/mod_articles_testimonial/js/js.js');

if (!$list) {
    return;
}

?>

<div class="testimonial-container">
    <button id="prev">&lt;</button>
    <div class="testimonial-wrapper">
        <div class="testimonial-slider row">
            <?php foreach ($list as $item) : ?>
                
                <?php 
                    $images = json_decode($item->images);

                    $fieldValue = "";
                    $context="com_content.article";
                    $fields = FieldsHelper::getFields($context, $item);
                    foreach($fields as $field)
                    {
                        if($field->name == $params->get('customer_position_field_name'))
                        {
                           $fieldValue = $field->rawvalue;
                           break;
                        }
                    }
                    
                ?>
                <div class="testimonial col-xs-12 col-md-6">
                    <div class="testimoial-container">
                        <div class="testimoial-author">
                        <div class="row">
                            <div class="testimonial-avatar col-3">
                                    <img src="<?php echo $images->image_intro;?>" alt="<?php echo $images->image_intro_alt;?>" />
                                </div>
                                <div class="testimonial-names col-9">
                                    <h4><?php echo $item->title; ?></h4>
                                    <?php echo $fieldValue;?>
                                </div>
                            </div>
                        </div>    
                        <div class="testimonial-content">
                            <?php echo $item->introtext;?>
                        </div>
                        
                    </div>
                   
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <button id="next">&gt;</button>
</div>

<!-- Pagination Dots -->
<div class="dots-container"></div>
