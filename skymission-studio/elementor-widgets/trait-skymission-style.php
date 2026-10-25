<?php
if ( ! defined('ABSPATH') ) exit;

/**
 * Shared style-control helpers used by every SkyMission Elementor widget.
 * Keeps the "Style" tab controls (color / typography) consistent and short
 * to write, while every default value matches the original theme design —
 * so nothing changes visually until the user edits a value in Elementor.
 */
trait SkyMission_Style_Controls {

	/**
	 * Add a text-color control bound to a CSS selector.
	 */
	protected function sky_color( $id, $label, $selector, $default ) {
		$this->add_control( $id, array(
			'label'     => $label,
			'type'      => \Elementor\Controls_Manager::COLOR,
			'default'   => $default,
			'selectors' => array(
				$selector => 'color: {{VALUE}};',
			),
		) );
	}

	/**
	 * Add a background-color control bound to a CSS selector.
	 */
	protected function sky_bg( $id, $label, $selector, $default ) {
		$this->add_control( $id, array(
			'label'     => $label,
			'type'      => \Elementor\Controls_Manager::COLOR,
			'default'   => $default,
			'selectors' => array(
				$selector => 'background: {{VALUE}};',
			),
		) );
	}

	/**
	 * Add a font-size control (slider) bound to a CSS selector.
	 * Kept intentionally lighter than a full typography group so it
	 * only touches size — nothing else changes unless the user drags it.
	 */
	protected function sky_font_size( $id, $label, $selector ) {
		$this->add_control( $id, array(
			'label'      => $label,
			'type'       => \Elementor\Controls_Manager::SLIDER,
			'size_units' => array( 'px', 'em', 'rem' ),
			'range'      => array(
				'px'  => array( 'min' => 8, 'max' => 140 ),
				'em'  => array( 'min' => 0.5, 'max' => 12, 'step' => 0.1 ),
				'rem' => array( 'min' => 0.5, 'max' => 12, 'step' => 0.1 ),
			),
			'selectors'  => array(
				$selector => 'font-size: {{SIZE}}{{UNIT}};',
			),
		) );
	}

	/**
	 * Thin divider between control groups inside a Style section.
	 * $id must be unique within the calling widget's section.
	 */
	protected function sky_divider( $id ) {
		$this->add_control( 'sky_divider_' . $id, array(
			'type' => \Elementor\Controls_Manager::DIVIDER,
		) );
	}
}
