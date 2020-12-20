<?php
namespace LitipayAddons\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Widget_Base;
use Elementor\Group_Control_Image_Size;


class LP_Carousel_2 extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'lp-carousel-2';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Litipay Carousel 2', 'plugin-name' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-post-navigation';
    }

	public function get_keywords() {
		return ['slider', 'lp-slider-2', 'carousel', 'litipay carousel 2', 'litipay', 'shop'];
	}

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['general'];
    }

    /**
     * Overriding default function to add custom html class.
     *
     * @return string
     */
    public function get_html_wrapper_class() {
        $html_class = parent::get_html_wrapper_class();
        $html_class .= ' ' . $this->get_name();
        $html_class .= ' lp-tst-carousel-2';
        return rtrim( $html_class );
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {

        $this->register_content_controls();

        $this->register_style_controls();
    }

    protected function register_content_controls() {

		$this->slides_controls();

		$this->settings_controls();

    }

    protected function slides_controls() {

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Slides', 'happy-elementor-addons' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'review',
			[
				'label' => __( 'Review', 'happy-elementor-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type amazing review from happy reviewer', 'happy-elementor-addons' ),
				'default' => __( '"I was only being offered a small amount to cover our medical bills after a car accident. Litipay helped to cover my medical bills so I could keep my case open."', 'happy-elementor-addons' ),
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				]
			]
		);

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Avatar', 'happy-elementor-addons' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'reviewer',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Reviewer', 'happy-elementor-addons' ),
                'placeholder' => __( 'Type title here', 'happy-elementor-addons' ),
				'default' => __( 'Samantha, 34', 'happy-elementor-addons' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'happy-elementor-addons' ),
                'placeholder' => __( 'Type title here', 'happy-elementor-addons' ),
				'default' => __( 'Cook & Associate', 'happy-elementor-addons' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
                'default' => [
                    [
						'review' => __( '"I was only being offered a small amount to cover our medical bills after a car accident. Litipay helped to cover my medical bills so I could keep my case open."', 'happy-elementor-addons' ),
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
						],
						'reviewer' => __( 'Samantha, 34', 'happy-elementor-addons' ),
						'title' => __( 'Cook & Associate', 'happy-elementor-addons' ),
                    ],
                    [
						'review' => __( '"I was only being offered a small amount to cover our medical bills after a car accident. Litipay helped to cover my medical bills so I could keep my case open."', 'happy-elementor-addons' ),
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
						],
						'reviewer' => __( 'Samantha, 34', 'happy-elementor-addons' ),
						'title' => __( 'Cook & Associate', 'happy-elementor-addons' ),
                    ],
                    [
						'review' => __( '"I was only being offered a small amount to cover our medical bills after a car accident. Litipay helped to cover my medical bills so I could keep my case open."', 'happy-elementor-addons' ),
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
						],
						'reviewer' => __( 'Samantha, 34', 'happy-elementor-addons' ),
						'title' => __( 'Cook & Associate', 'happy-elementor-addons' ),
                    ],
                    [
						'review' => __( '"I was only being offered a small amount to cover our medical bills after a car accident. Litipay helped to cover my medical bills so I could keep my case open."', 'happy-elementor-addons' ),
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
						],
						'reviewer' => __( 'Samantha, 34', 'happy-elementor-addons' ),
						'title' => __( 'Cook & Associate', 'happy-elementor-addons' ),
                    ]
				],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();
	}

    protected function settings_controls() {

		$this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'happy-elementor-addons' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'animation_speed',
            [
                'label' => __( 'Animation Speed', 'happy-elementor-addons' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 10,
                'max' => 10000,
                'default' => 300,
                'description' => __( 'Slide speed in milliseconds', 'happy-elementor-addons' ),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay?', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'happy-elementor-addons' ),
                'label_off' => __( 'No', 'happy-elementor-addons' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __( 'Autoplay Speed', 'happy-elementor-addons' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 100,
                'max' => 10000,
                'default' => 3000,
                'description' => __( 'Autoplay speed in milliseconds', 'happy-elementor-addons' ),
                'condition' => [
                    'autoplay' => 'yes'
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __( 'Infinite Loop?', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'happy-elementor-addons' ),
                'label_off' => __( 'No', 'happy-elementor-addons' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'vertical',
            [
                'label' => __( 'Vertical Mode?', 'happy-elementor-addons' ),
				'type' => Controls_Manager::HIDDEN,
                'default' => 'no',
                // 'label_on' => __( 'Yes', 'happy-elementor-addons' ),
                // 'label_off' => __( 'No', 'happy-elementor-addons' ),
                // 'return_value' => 'yes',
                // 'frontend_available' => true,
                // 'style_transfer' => true,
            ]
        );

        $this->add_control(
            'navigation',
            [
                'label' => __( 'Navigation', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __( 'None', 'happy-elementor-addons' ),
                    'arrow' => __( 'Arrow', 'happy-elementor-addons' ),
                    // 'dots' => __( 'Dots', 'happy-elementor-addons' ),
                    // 'both' => __( 'Arrow & Dots', 'happy-elementor-addons' ),
                ],
                'default' => 'arrow',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

		$this->add_responsive_control(
			'slides_to_show',
			[
				'label' => __( 'Slides To Show', 'happy-elementor-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					1 => __( '1 Slide', 'happy-elementor-addons' ),
					2 => __( '2 Slides', 'happy-elementor-addons' ),
					3 => __( '3 Slides', 'happy-elementor-addons' ),
					4 => __( '4 Slides', 'happy-elementor-addons' ),
					5 => __( '5 Slides', 'happy-elementor-addons' ),
					6 => __( '6 Slides', 'happy-elementor-addons' ),
				],
				'desktop_default' => 3,
				'tablet_default' => 2,
				'mobile_default' => 1,
				'frontend_available' => true,
				'style_transfer' => true,
			]
		);

        $this->end_controls_section();
	}

    protected function register_style_controls() {
		$this->slider_item_controls();
		$this->slider_review_controls();
		$this->slider_content_controls();
		$this->nav_arrow_controls();
	}

    protected function slider_item_controls() {

        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __( 'Slider Item', 'happy-elementor-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item_background',
                'selector' => '{{WRAPPER}} .lp-tst-carousel-2-item',
                'exclude' => [
                    'image'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'selector' => '{{WRAPPER}} .lp-tst-carousel-2-item',
            ]
        );

        $this->add_responsive_control(
            'item_border_radius',
            [
                'label' => __( 'Border Radius', 'happy-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .lp-tst-carousel-2-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_box_shadow',
				'label' => __( 'Box Shadow', 'happy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .lp-tst-carousel-2-item',
			]
		);

        $this->end_controls_section();

	}

    protected function slider_review_controls() {

		$this->start_controls_section(
            '_section_style_review',
            [
                'label' => __( 'Review', 'happy-elementor-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

        $this->add_responsive_control(
            'review_area_padding',
            [
                'label' => __( 'Padding', 'happy-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} blockquote.ha-tst-item-2__blockquote' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'review_spacing',
            [
                'label' => __( 'Bottom Spacing', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} blockquote.ha-tst-item-2__blockquote p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'review_color',
            [
                'label' => __( 'Text Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} blockquote.ha-tst-item-2__blockquote p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'review_typography',
                'selector' => '{{WRAPPER}} blockquote.ha-tst-item-2__blockquote p',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->end_controls_section();

	}

    protected function slider_content_controls() {

		$this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Content', 'happy-elementor-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

        $this->add_responsive_control(
            'content_area_padding',
            [
                'label' => __( 'Padding', 'happy-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ha-tst-item-2__content .ha-tst-item-2__auth' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_area_background',
                'selector' => '{{WRAPPER}} .ha-tst-item-2__content .ha-tst-item-2__auth',
                'exclude' => [
                    'image'
                ]
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_box_shadow',
				'label' => __( 'Box Shadow', 'happy-elementor-addons' ),
				'selector' => '{{WRAPPER}} .ha-tst-item-2__content .ha-tst-item-2__auth',
			]
		);

        $this->add_control(
            '_heading_avater',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Avater', 'happy-elementor-addons' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'avater_spacing',
            [
                'label' => __( 'Space Between', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ha-tst-item-2__content .ha-tst-item-2__auth .ha-tst-item-2__auth-thumb' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_heading_reviewer',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Reviewer', 'happy-elementor-addons' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'reviewer_spacing',
            [
                'label' => __( 'Bottom Spacing', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ha-tst-item-2__auth .ha-tst-item-2__auth-content h3' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'reviewer_color',
            [
                'label' => __( 'Text Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ha-tst-item-2__auth .ha-tst-item-2__auth-content h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'reviewer_typography',
                'selector' => '{{WRAPPER}} .ha-tst-item-2__auth .ha-tst-item-2__auth-content h3',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );


        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'happy-elementor-addons' ),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ha-tst-item-2__content .ha-tst-item-2__auth-content span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .ha-tst-item-2__content .ha-tst-item-2__auth-content span',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->end_controls_section();

	}

    protected function nav_arrow_controls() {

		$this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => __( 'Navigation - Arrow', 'happy-elementor-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'navigation' => 'arrow'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => __( 'Border Radius', 'happy-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_arrow' );

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __( 'Normal', 'happy-elementor-addons' ),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __( 'Text Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __( 'Background Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __( 'Hover', 'happy-elementor-addons' ),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => __( 'Text Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __( 'Background Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => __( 'Border Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

	}

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( empty( $settings['slides'] ) ) {
            return;
		}
        ?>

        <div class="lpjs-slick lp-tst-carousel-2-container">

            <?php foreach ( $settings['slides'] as $slide ) :
                $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );

				if ( ! $image ) {
					$image = $slide['image']['url'];
				}

				$id = 'lp-tst-carousel-2-item-' . $slide['_id'];

				$this->add_render_attribute( $id, 'class', 'lp-tst-carousel-2-item' );

				?>

                <div class="lp-tst-carousel-2-inner">
					<div <?php $this->print_render_attribute_string( $id ); ?>>

						<div class="ha-tst-item-2__content">

							<?php if ( $slide['review'] || $slide['reviewer'] ) : ?>
								<blockquote class="ha-tst-item-2__blockquote">
									<img class="ha-tst-item-2__quote-icon" src="<?php echo litipay_addon_plugin_url('assets/img/quote.svg'); ?>" alt="">
									<?php if ( $slide['review'] ) : ?>
										<p><?php echo '"' . esc_html( $slide['review'] ) . '"'; ?></p>
									<?php endif; ?>
								</blockquote>
							<?php endif; ?>

							<div class="ha-tst-item-2__auth">

								<?php if ( $image ) : ?>
									<div class="ha-tst-item-2__auth-thumb">
										<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $slide['reviewer'] ); ?>">
									</div>
								<?php endif; ?>

								<?php if ( $slide['reviewer'] || $slide['title'] ) : ?>
									<div class="ha-tst-item-2__auth-content">
										<?php if ( $slide['reviewer'] ) : ?>
											<h3><?php esc_html_e( $slide['reviewer'] ); ?></h3>
											<?php endif; ?>
										<?php if ( $slide['title'] ) : ?>
												<span><?php esc_html_e( $slide['title'] ); ?></span>
										<?php endif; ?>
									</div>
								<?php endif; ?>

							</div>

						</div>

					</div>
				</div>

            <?php endforeach; ?>

        </div>
		<?php if ( 'arrow' === $settings['navigation'] ) : ?>
			<div class="lp-tst-carousel-2-nav"></div>
		<?php endif; ?>

        <?php
    }

}
