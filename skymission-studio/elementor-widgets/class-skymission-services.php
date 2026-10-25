<?php
if(!defined('ABSPATH')) exit;
class SkyMission_Services_Widget extends \Elementor\Widget_Base {
 use SkyMission_Style_Controls;
 public function get_name(){return 'skymission_services';} public function get_title(){return 'SkyMission — Services';} public function get_icon(){return 'eicon-gallery-grid';} public function get_categories(){return ['skymission'];}
 protected function register_controls(){
  $this->start_controls_section('content',['label'=>'Services']);
  foreach([['label','Label','Services'],['heading','Heading','Visual Solutions<br /><span class="services__heading-accent">Tailored for Construction & Development.</span>'],['t1','Featured Title','Project Showcase & Flyover<br />Overview'],['d1','Featured Description','Cinematic drone video and aerial flyover coverage capturing the full scale, layout, and progress of your construction project — ideal for tenders, stakeholder presentations, marketing, and project handover documentation.'],['t2','Card 2 Title','Progress<br />Documentation'],['d2','Card 2 Description','Scheduled drone site visits to capture key construction milestones, providing consistent visual records for reporting, stakeholder communication, and project tracking across all stages of development.'],['t3','Card 3 Title','Timelapse & Project<br />Tracking'],['d3','Card 3 Description','Long-term visual tracking of your construction project using drone imagery and timelapse, documenting progress from early works to completion — ideal for reporting, marketing, and historical project records.'],['t4','Wide Title','Aerial Drone Coverage'],['d4','Wide Description','High-resolution aerial photography and video capturing site context, scale, and development progress — safely and compliantly.'],['note','Wide Note','Photography, drone imagery, and video — delivered at the resolution and format your project needs. Every flight planned and executed in full compliance with CASA regulations.'],['button','Button Text','Request This Service'] ] as $c){$this->add_control($c[0],['label'=>$c[1],'type'=>($c[0]==='d1'||$c[0]==='d2'||$c[0]==='d3'||$c[0]==='d4'||$c[0]==='note')?\Elementor\Controls_Manager::TEXTAREA:((strpos($c[2],'<')!==false)?\Elementor\Controls_Manager::WYSIWYG:\Elementor\Controls_Manager::TEXT),'default'=>$c[2]]);}
  $this->add_control('button_link',['label'=>'Button Link','type'=>\Elementor\Controls_Manager::URL,'default'=>['url'=>'#']]); $this->add_control('featured_image',['label'=>'Featured Card Image','type'=>\Elementor\Controls_Manager::MEDIA,'default'=>['url'=>SKYMISSION_THEME_URI.'/assets/project-showcase-featured.png']]); $this->add_control('showcase_image',['label'=>'Showcase Image','type'=>\Elementor\Controls_Manager::MEDIA,'default'=>['url'=>SKYMISSION_THEME_URI.'/assets/frame-5.png']]);
  $this->end_controls_section();

  $this->start_controls_section('style_text',['label'=>'استایل — متن','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
  $this->sky_color('label_color','رنگ لیبل','{{WRAPPER}} .services__label','#a96ee8');
  $this->sky_divider('services_1');
  $this->sky_color('heading_color','رنگ عنوان','{{WRAPPER}} .services__heading','#f4f2ff');
  $this->sky_font_size('heading_typo','اندازه فونت','{{WRAPPER}} .services__heading');
  $this->sky_divider('services_2');
  $this->sky_color('card_title_color','رنگ عنوان کارت‌ها','{{WRAPPER}} .bento-card__title, {{WRAPPER}} .bento-card__title1','#f4f2ff');
  $this->sky_color('card_desc_color','رنگ توضیح کارت‌ها','{{WRAPPER}} .bento-card__desc, {{WRAPPER}} .bento-card__desc2','rgba(244,242,255,0.65)');
  $this->sky_divider('services_3');
  $this->sky_color('note_color','رنگ متن یادداشت','{{WRAPPER}} .bento-card__note','rgba(244,242,255,0.65)');
  $this->end_controls_section();

  $this->start_controls_section('style_button',['label'=>'استایل — دکمه','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
  $this->sky_color('btn_text_color','رنگ متن دکمه','{{WRAPPER}} .btn--glass','#f4f2ff');
  $this->sky_bg('btn_bg_color','رنگ پس‌زمینه دکمه','{{WRAPPER}} .btn--glass','rgba(244,242,255,0.1)');
  $this->sky_bg('btn_bg_hover_color','رنگ دکمه هنگام هاور','{{WRAPPER}} .btn--glass:hover','rgba(244,242,255,0.16)');
  $this->sky_font_size('btn_typo','اندازه فونت','{{WRAPPER}} .btn--glass');
  $this->end_controls_section();
 }
 protected function render(){ $s=$this->get_settings_for_display(); $fi=$s['featured_image']['url']??SKYMISSION_THEME_URI.'/assets/project-showcase-featured.png'; $si=$s['showcase_image']['url']??SKYMISSION_THEME_URI.'/assets/frame-5.png'; $u=$s['button_link']['url']??'#'; ?>
<section class="services" aria-labelledby="services-heading"><div class="services__orb" aria-hidden="true"></div><div class="services__wrap"><div class="services__header"><p class="services__label"><?php echo esc_html($s['label']); ?></p><h2 id="services-heading" class="services__heading"><?php echo wp_kses_post($s['heading']); ?></h2></div><div class="bento"><article class="bento-card bento-card--featured"><div class="bento-card__bg" aria-hidden="true"><img src="<?php echo esc_url($fi); ?>" alt=""/><div class="bento-card__bg-overlay"></div></div><h3 class="bento-card__title1"><?php echo wp_kses_post($s['t1']); ?></h3><p class="bento-card__desc2"><?php echo esc_html($s['d1']); ?></p></article><article class="bento-card"><h3 class="bento-card__title"><?php echo wp_kses_post($s['t2']); ?></h3><p class="bento-card__desc"><?php echo esc_html($s['d2']); ?></p></article><article class="bento-card"><h3 class="bento-card__title"><?php echo wp_kses_post($s['t3']); ?></h3><p class="bento-card__desc"><?php echo esc_html($s['d3']); ?></p></article><article class="bento-card bento-card--wide"><div class="bento-card__wide-col"><h3 class="bento-card__title"><?php echo esc_html($s['t4']); ?></h3><p class="bento-card__desc"><?php echo esc_html($s['d4']); ?></p></div><div class="bento-card__wide-col bento-card__wide-col--end"><p class="bento-card__note"><?php echo esc_html($s['note']); ?></p><a href="<?php echo esc_url($u); ?>" class="btn btn--glass"><?php echo esc_html($s['button']); ?><svg class="icon" viewBox="0 0 24 24" fill="none"><path d="M7 17L17 7M17 7H8M17 7V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a></div></article></div><div class="services__showcase"><img src="<?php echo esc_url($si); ?>" alt="" class="services__showcase-img"/></div></div></section>
<?php }
}
