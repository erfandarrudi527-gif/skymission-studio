<?php
if(!defined('ABSPATH')) exit;
class SkyMission_Why_Widget extends \Elementor\Widget_Base {
 use SkyMission_Style_Controls;
 public function get_name(){return 'skymission_why';} public function get_title(){return 'SkyMission — Why Choose';} public function get_icon(){return 'eicon-check-circle';} public function get_categories(){return ['skymission'];}
 protected function register_controls(){
  $this->start_controls_section('content',['label'=>'Why Choose']);
  $this->add_control('label',['label'=>'Label','type'=>\Elementor\Controls_Manager::TEXT,'default'=>'Why Choose SkyMission Studio']);
  $this->add_control('heading',['label'=>'Heading','type'=>\Elementor\Controls_Manager::WYSIWYG,'default'=>'Why Developers & Builders<br /><span class="why__heading-accent">Choose SkyMission Studio.</span>']);
  $items=[['Built for the Built Environment','We understand construction workflows, site constraints, and what needs to be captured — not just how it looks.'],['CASA Certified & Fully Insured','Licensed drone operations (RePL + AROC) with full compliance, risk awareness, and safe on-site execution.'],['Structured, Reliable Workflow','Clear process from briefing to delivery — no guesswork, no delays, no chasing.'],['Consistent, Professional Output','Every asset is captured and edited with purpose — ready for reporting, presentations, and marketing use.'],['Fast & Flexible Delivery','Responsive scheduling and efficient turnaround to match project timelines and site conditions.'],['Clear Communication, Start to Finish','Direct, transparent communication — so you always know what\'s happening and what to expect.']];
  foreach($items as $i=>$v){$n=$i+1;$this->add_control('t'.$n,['label'=>'Card '.$n.' Title','type'=>\Elementor\Controls_Manager::TEXT,'default'=>$v[0]]);$this->add_control('d'.$n,['label'=>'Card '.$n.' Description','type'=>\Elementor\Controls_Manager::TEXTAREA,'default'=>$v[1]]);}
  $this->end_controls_section();

  $this->start_controls_section('style_text',['label'=>'استایل — متن','tab'=>\Elementor\Controls_Manager::TAB_STYLE]);
  $this->sky_color('label_color','رنگ لیبل','{{WRAPPER}} .why__label','#a96ee8');
  $this->sky_divider('why_1');
  $this->sky_color('heading_color','رنگ عنوان','{{WRAPPER}} .why__heading','#f4f2ff');
  $this->sky_font_size('heading_typo','اندازه فونت','{{WRAPPER}} .why__heading');
  $this->sky_divider('why_2');
  $this->sky_color('card_title_color','رنگ عنوان کارت‌ها','{{WRAPPER}} .why-card__title','#f4f2ff');
  $this->sky_color('card_desc_color','رنگ توضیح کارت‌ها','{{WRAPPER}} .why-card__desc','rgba(244,242,255,0.65)');
  $this->end_controls_section();
 }
 protected function render(){ $s=$this->get_settings_for_display(); $icons=['<path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/>','<path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"/><path d="M9.5 12l1.8 1.8L14.8 10"/>','<path d="M4 6h16M4 12h16M4 18h10"/><circle cx="19" cy="18" r="1.6" fill="currentColor"/>','<rect x="3" y="6" width="18" height="13" rx="2"/><path d="M8 6l2-2h4l2 2"/><circle cx="12" cy="12.5" r="3.2"/>','<path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/>','<path d="M21 12a8 8 0 1 1-3.5-6.6"/><path d="M20 4v5h-5"/><path d="M8 11h5M8 14h3"/>']; ?>
<section class="why" aria-labelledby="why-heading"><div class="why__orb" aria-hidden="true"></div><div class="why__wrap"><div class="why__header"><p class="why__label"><?php echo esc_html($s['label']); ?></p><h2 id="why-heading" class="why__heading"><?php echo wp_kses_post($s['heading']); ?></h2></div><ul class="why__grid"><?php for($i=1;$i<=6;$i++): ?><li class="why-card"><span class="why-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><?php echo $icons[$i-1]; ?></svg></span><h3 class="why-card__title"><?php echo esc_html($s['t'.$i]); ?></h3><p class="why-card__desc"><?php echo esc_html($s['d'.$i]); ?></p></li><?php endfor; ?></ul></div></section>
<?php }
}
