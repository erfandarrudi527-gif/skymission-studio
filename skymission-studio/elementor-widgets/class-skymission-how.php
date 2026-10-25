<?php
if(!defined('ABSPATH')) exit;
class SkyMission_How_Widget extends \Elementor\Widget_Base {
 use SkyMission_Style_Controls;
 public function get_name(){return 'skymission_how';} public function get_title(){return 'SkyMission — How It Works';} public function get_icon(){return 'eicon-flow';} public function get_categories(){return ['skymission'];}
 protected function register_controls(){
  $this->start_controls_section('content',['label'=>'How It Works']);
  $this->add_control('label',['label'=>'Label','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'How It Works']);
  $this->add_control('heading',['label'=>'Heading','type'=>\Elementor\Controls_Manager::WYSIWYG,'default'=>'A Structured Approach<br /><span class="how__heading-accent">for Real Projects.</span>']);
  $this->add_control('s1t',['label'=>'Step 1 Title','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'We capture what matters']); $this->add_control('s1d',['label'=>'Step 1 Description','type'=>\Elementor\Controls_Manager::TEXTAREA,'default'=>'We capture site scale, key stages, and critical details — focusing on visuals that communicate real project value.']);
  $this->add_control('s2t',['label'=>'Step 2 Title','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'We document the process']); $this->add_control('s2d',['label'=>'Step 2 Description','type'=>\Elementor\Controls_Manager::TEXTAREA,'default'=>'We record progress, sequencing, and milestones so your work is clearly understood — not just visually presented.']);
  $this->add_control('s3t',['label'=>'Step 3 Title','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'We deliver ready-to-use media']); $this->add_control('s3d',['label'=>'Step 3 Description','type'=>\Elementor\Controls_Manager::TEXTAREA,'default'=>'Every asset is edited, organised, and delivered ready for reporting, presentations, or stakeholder use.']);
  $this->add_control('button',['label'=>'CTA Text','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'Request Your Project Quote']); $this->add_control('link',['label'=>'CTA Link','type'=>\Elementor\Controls_Manager::URL,'default'=>['url'=>'#quote']]); $this->add_control('note',['label'=>'CTA Note','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'Flexible scheduling • Reliable delivery']);
  $this->end_controls_section();

  $this->start_controls_section('style_text',['label'=>'استایل — متن','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
  $this->sky_color('label_color','رنگ لیبل','{{WRAPPER}} .how__label','#a96ee8');
  $this->sky_divider('how_1');
  $this->sky_color('heading_color','رنگ عنوان','{{WRAPPER}} .how__heading','#f4f2ff');
  $this->sky_font_size('heading_typo','اندازه فونت','{{WRAPPER}} .how__heading');
  $this->sky_divider('how_2');
  $this->sky_color('step_title_color','رنگ عنوان مراحل','{{WRAPPER}} .how-step__title','#f4f2ff');
  $this->sky_color('step_desc_color','رنگ توضیح مراحل','{{WRAPPER}} .how-step__desc','rgba(244,242,255,0.65)');
  $this->sky_divider('how_3');
  $this->sky_color('note_color','رنگ متن پایینِ دکمه','{{WRAPPER}} .how__cta-note','rgba(244,242,255,0.65)');
  $this->end_controls_section();

  $this->start_controls_section('style_button',['label'=>'استایل — دکمه','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
  $this->sky_color('btn_text_color','رنگ متن دکمه','{{WRAPPER}} .how__cta .btn','#ffffff');
  $this->sky_bg('btn_bg_color','رنگ پس‌زمینه دکمه','{{WRAPPER}} .how__cta .btn','#8f4ad8');
  $this->sky_bg('btn_bg_hover_color','رنگ دکمه هنگام هاور','{{WRAPPER}} .how__cta .btn:hover','#8f4ad8');
  $this->sky_font_size('btn_typo','اندازه فونت','{{WRAPPER}} .how__cta .btn');
  $this->end_controls_section();
 }
 protected function render(){ $s=$this->get_settings_for_display(); $u=!empty($s['link']['url'])?$s['link']['url']:'#quote'; ?>
<section class="how" aria-labelledby="how-heading"><div class="how__wrap"><div class="how__header"><p class="how__label"><?php echo esc_html($s['label']); ?></p><h2 id="how-heading" class="how__heading"><?php echo wp_kses_post($s['heading']); ?></h2></div><ol class="how__steps">
<?php foreach([['1st','s1t','s1d'],['2nd','s2t','s2d'],['3rd','s3t','s3d']] as $x): ?><li class="how-step"><span class="how-step__n"><?php echo esc_html($x[0]); ?></span><h3 class="how-step__title"><?php echo esc_html($s[$x[1]]); ?></h3><p class="how-step__desc"><?php echo esc_html($s[$x[2]]); ?></p></li><?php endforeach; ?></ol><div class="how__cta"><a href="<?php echo esc_url($u); ?>" class="btn btn--primary"><?php echo esc_html($s['button']); ?><svg class="icon" viewBox="0 0 24 24" fill="none"><path d="M7 17L17 7M17 7H8M17 7V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a><p class="how__cta-note"><?php echo esc_html($s['note']); ?></p></div></div></section>
<?php }
}
