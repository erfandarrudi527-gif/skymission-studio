<?php
if(!defined('ABSPATH')) exit;
class SkyMission_FAQ_Widget extends \Elementor\Widget_Base {
 use SkyMission_Style_Controls;
 public function get_name(){return 'skymission_faq';} public function get_title(){return 'SkyMission — FAQ';} public function get_icon(){return 'eicon-accordion';} public function get_categories(){return ['skymission'];}
 protected function register_controls(){
  $this->start_controls_section('content',['label'=>'FAQ']); $this->add_control('label',['label'=>'Label','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'Frequently Asked Questions']); $this->add_control('heading',['label'=>'Heading','type'=>\Elementor\Controls_Manager::WYSIWYG,'default'=>'Everything You<br />Need to Know.']); $this->add_control('desc',['label'=>'Description','type'=>\Elementor\Controls_Manager::TEXTAREA,'default'=>'Everything you need to know about our construction and development visual media services — from capture to delivery.']); $this->add_control('button',['label'=>'Button Text','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'Ask Us Directly']); $this->add_control('link',['label'=>'Button Link','type'=>\Elementor\Controls_Manager::URL,'default'=>['url'=>'#contact']]);
 $qs=[['What types of projects do you work on?','We work across residential, commercial, industrial, and civil infrastructure builds — from single-site developments to multi-stage master-planned projects.'],['Will filming interrupt construction activities?','No. Flights are scheduled around your site\'s active work windows and safety requirements, so crews and machinery keep moving without disruption.'],['What information do you need before starting a project?','Site address and access details, a site contact, preferred capture frequency, and the intended use of the media (reporting, marketing, or tender) — that\'s enough for us to plan the first flight.'],['How quickly will we receive the photos or videos?','Standard turnaround is 2–3 business days after capture, with expedited delivery available for tenders and time-sensitive reporting.'],['Is your drone operation insured and licensed?','Yes — every flight is conducted under RePL and AROC licensing, fully insured, and operated in compliance with CASA regulations.'],['Do you provide regular progress documentation packages?','Yes. We offer scheduled weekly, fortnightly, or monthly capture plans so you get a consistent, organised visual record for the life of the project.'],['What happens if weather conditions are not suitable?','Safety comes first. If wind, rain, or visibility rule out a flight, we reschedule the visit at no extra cost — usually within the same week.']];
 foreach($qs as $i=>$v){$n=$i+1;$this->add_control('q'.$n,['label'=>'Question '.$n,'type'=>\Elementor\Controls_Manager::TEXT,'default'=>$v[0]]);$this->add_control('a'.$n,['label'=>'Answer '.$n,'type'=>\Elementor\Controls_Manager::TEXTAREA,'default'=>$v[1]]);} $this->end_controls_section();

  $this->start_controls_section('style_text',['label'=>'استایل — متن','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
  $this->sky_color('label_color','رنگ لیبل','{{WRAPPER}} .faq__label','#a96ee8');
  $this->sky_divider('faq_1');
  $this->sky_color('heading_color','رنگ عنوان','{{WRAPPER}} .faq__heading','#f4f2ff');
  $this->sky_font_size('heading_typo','اندازه فونت','{{WRAPPER}} .faq__heading');
  $this->sky_divider('faq_2');
  $this->sky_color('desc_color','رنگ توضیحات','{{WRAPPER}} .faq__desc','rgba(244,242,255,0.65)');
  $this->sky_divider('faq_3');
  $this->sky_color('question_color','رنگ متن سوال','{{WRAPPER}} .faq-item__q','#f4f2ff');
  $this->sky_color('answer_color','رنگ متن پاسخ','{{WRAPPER}} .faq-item__a p','rgba(244,242,255,0.65)');
  $this->end_controls_section();

  $this->start_controls_section('style_button',['label'=>'استایل — دکمه','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
  $this->sky_color('btn_text_color','رنگ متن دکمه','{{WRAPPER}} .faq__left .btn','#ffffff');
  $this->sky_bg('btn_bg_color','رنگ پس‌زمینه دکمه','{{WRAPPER}} .faq__left .btn','#8f4ad8');
  $this->sky_bg('btn_bg_hover_color','رنگ دکمه هنگام هاور','{{WRAPPER}} .faq__left .btn:hover','#8f4ad8');
  $this->sky_font_size('btn_typo','اندازه فونت','{{WRAPPER}} .faq__left .btn');
  $this->end_controls_section();
 }
 protected function render(){ $s=$this->get_settings_for_display(); $u=$s['link']['url']??'#contact'; ?>
<section class="faq" aria-labelledby="faq-heading"><div class="faq__wrap"><div class="faq__left"><p class="faq__label"><?php echo esc_html($s['label']); ?></p><h2 id="faq-heading" class="faq__heading"><?php echo wp_kses_post($s['heading']); ?></h2><p class="faq__desc"><?php echo esc_html($s['desc']); ?></p><a href="<?php echo esc_url($u); ?>" class="btn btn--primary"><?php echo esc_html($s['button']); ?><svg class="icon" viewBox="0 0 24 24" fill="none"><path d="M7 17L17 7M17 7H8M17 7V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a></div><div class="faq__list"><?php for($i=1;$i<=7;$i++): ?><div class="faq-item"><button class="faq-item__q" aria-expanded="false"><span><?php echo esc_html($s['q'.$i]); ?></span><span class="faq-item__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span></button><div class="faq-item__a"><p><?php echo esc_html($s['a'.$i]); ?></p></div></div><?php endfor; ?></div></div></section>
<?php }
}
