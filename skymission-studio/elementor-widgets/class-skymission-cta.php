<?php
if(!defined('ABSPATH')) exit;
class SkyMission_CTA_Widget extends \Elementor\Widget_Base {
 use SkyMission_Style_Controls;
 public function get_name(){return 'skymission_cta';} public function get_title(){return 'SkyMission — CTA';} public function get_icon(){return 'eicon-call-to-action';} public function get_categories(){return ['skymission'];}
 protected function register_controls(){
  $this->start_controls_section('content',['label'=>'CTA']); $this->add_control('heading',['label'=>'Heading','type'=>\Elementor\Controls_Manager::WYSIWYG,'default'=>'Have something in mind?<br /><span class="cta__heading-light">Let’s talk.</span>']); $this->add_control('desc',['label'=>'Description','type'=>\Elementor\Controls_Manager::TEXTAREA,'default'=>'Tell us what you are planning. We will help shape the right capture approach and connect it to the production schedule.']); $this->add_control('button',['label'=>'Button Text','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'Contact Us']); $this->add_control('link',['label'=>'Button Link','type'=>\Elementor\Controls_Manager::URL,'default'=>['url'=>'#contact']]); $this->end_controls_section();

  $this->start_controls_section('style_heading',['label'=>'استایل — عنوان و توضیحات','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
  $this->sky_color('heading_color','رنگ عنوان','{{WRAPPER}} .cta__heading','#f4f2ff');
  $this->sky_font_size('heading_typo','اندازه فونت','{{WRAPPER}} .cta__heading');
  $this->sky_divider('cta_1');
  $this->sky_color('desc_color','رنگ توضیحات','{{WRAPPER}} .cta__desc','rgba(244,242,255,0.65)');
  $this->sky_font_size('desc_typo','اندازه فونت','{{WRAPPER}} .cta__desc');
  $this->end_controls_section();

  $this->start_controls_section('style_button',['label'=>'استایل — دکمه','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
  $this->sky_color('btn_text_color','رنگ متن دکمه','{{WRAPPER}} .cta__btn','#ffffff');
  $this->sky_bg('btn_bg_color','رنگ پس‌زمینه دکمه','{{WRAPPER}} .cta__btn','#8f4ad8');
  $this->sky_bg('btn_bg_hover_color','رنگ دکمه هنگام هاور','{{WRAPPER}} .cta__btn:hover','#8f4ad8');
  $this->sky_font_size('btn_typo','اندازه فونت','{{WRAPPER}} .cta__btn');
  $this->end_controls_section();
 }
 protected function render(){ $s=$this->get_settings_for_display(); $u=$s['link']['url']??'#contact'; ?><section class="cta" aria-labelledby="cta-heading"><div class="cta__orb" aria-hidden="true"></div><div class="cta__wrap"><div class="cta__panel"><div class="cta__content"><h2 id="cta-heading" class="cta__heading"><?php echo wp_kses_post($s['heading']); ?></h2><p class="cta__desc"><?php echo esc_html($s['desc']); ?></p></div><a href="<?php echo esc_url($u); ?>" class="btn btn--primary cta__btn"><?php echo esc_html($s['button']); ?></a></div></div></section><?php }
}
