<?php
if(!defined('ABSPATH')) exit;
class SkyMission_Hero_Widget extends \Elementor\Widget_Base {
 use SkyMission_Style_Controls;
 public function get_name(){return 'skymission_hero';} public function get_title(){return 'SkyMission — Hero';} public function get_icon(){return 'eicon-banner';} public function get_categories(){return ['skymission'];}
 protected function register_controls(){
  $this->start_controls_section('content',['label'=>'Hero Content']);
  $this->add_control('label',['label'=>'Label','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'Brisbane, Australia — CASA Certified']);
  $this->add_control('title',['label'=>'Title','type'=>\Elementor\Controls_Manager::WYSIWYG,'default'=>'Visual Media for<br />Construction Development<br />Projects']);
  $this->add_control('sub',['label'=>'Description','type'=>\Elementor\Controls_Manager::TEXTAREA,'default'=>'Construction video and photography for Brisbane, Gold Coast, and Sunshine Coast. Structured, high-quality visuals — from progress to final showcase — ready for reporting and stakeholder communication.']);
  $this->add_control('button',['label'=>'Button Text','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'Book a Mission']);
  $this->add_control('link',['label'=>'Button Link','type'=>\Elementor\Controls_Manager::URL,'default'=>['url'=>'#book']]);
  $this->add_control('image',['label'=>'Hero Background','type'=>\Elementor\Controls_Manager::MEDIA,'default'=>['url'=>SKYMISSION_THEME_URI.'/assets/project-showcase-featured.png']]);
  $this->end_controls_section();

  $this->start_controls_section('style_text',['label'=>'استایل — متن','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
  $this->sky_color('label_color','رنگ لیبل بالا','{{WRAPPER}} .hero__label','#f4f2ff');
  $this->sky_divider('hero_1');
  $this->sky_color('title_color','رنگ عنوان اصلی','{{WRAPPER}} .hero__title','#f4f2ff');
  $this->sky_font_size('title_typo','اندازه فونت','{{WRAPPER}} .hero__title');
  $this->sky_divider('hero_2');
  $this->sky_color('sub_color','رنگ توضیحات','{{WRAPPER}} .hero__sub','rgba(244,242,255,0.65)');
  $this->sky_font_size('sub_typo','اندازه فونت','{{WRAPPER}} .hero__sub');
  $this->end_controls_section();

  $this->start_controls_section('style_button',['label'=>'استایل — دکمه','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
  $this->sky_color('btn_text_color','رنگ متن دکمه','{{WRAPPER}} .hero__actions .btn','#ffffff');
  $this->sky_bg('btn_bg_color','رنگ پس‌زمینه دکمه','{{WRAPPER}} .hero__actions .btn','#8f4ad8');
  $this->sky_bg('btn_bg_hover_color','رنگ دکمه هنگام هاور','{{WRAPPER}} .hero__actions .btn:hover','#8f4ad8');
  $this->sky_font_size('btn_typo','اندازه فونت','{{WRAPPER}} .hero__actions .btn');
  $this->end_controls_section();
 }
 protected function render(){ $s=$this->get_settings_for_display(); $img=!empty($s['image']['url'])?$s['image']['url']:SKYMISSION_THEME_URI.'/assets/project-showcase-featured.png'; $url=!empty($s['link']['url'])?$s['link']['url']:'#book'; ?>
<section class="hero" aria-label="SkyMission Studio"><div class="hero__bg" aria-hidden="true"><img src="<?php echo esc_url($img); ?>" alt="" class="hero__bg-img"/><div class="hero__overlay"></div></div><div class="hero__grid-lines" aria-hidden="true"><span></span><span></span><span></span><span></span></div><div class="hero__content"><p class="hero__label"><span class="hero__label-line"></span><?php echo esc_html($s['label']); ?></p><h1 class="hero__title"><?php echo wp_kses_post($s['title']); ?></h1><p class="hero__sub"><?php echo esc_html($s['sub']); ?></p><div class="hero__actions"><a href="<?php echo esc_url($url); ?>" class="btn btn--primary"><?php echo esc_html($s['button']); ?><svg class="icon" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 17L17 7M17 7H8M17 7V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a></div></div></section>
<?php }
}
