<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Meios_Canais_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'meios_canais';
    }

    public function get_title()
    {
        return 'Meios e Canais';
    }

    public function get_icon()
    {
        return 'eicon-post-list';
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function register_controls()
    {

        $this->start_controls_section('content_section', [
            'label' => 'Conteúdo',
        ]);

        $this->add_control('subtitle', [
            'label' => 'Sobre-título',
            'type' => Controls_Manager::TEXT,
            'default' => 'Onde você quer Star?',
        ]);

        $this->add_control('title', [
            'label' => 'Título',
            'type' => Controls_Manager::TEXT,
            'default' => 'MEIOS E CANAIS',
        ]);

        $repeater = new Repeater();

        $repeater->add_control('item_title', [
            'label' => 'Título',
            'type' => Controls_Manager::TEXT,
            'default' => 'TV’s',
        ]);

        $repeater->add_control('item_description', [
            'label' => 'Descrição',
            'type' => Controls_Manager::TEXTAREA,
            'default' => 'Veiculação de mídia nos mais variados canais...',
        ]);

        $repeater->add_control('item_image', [
            'label' => 'Imagem',
            'type' => Controls_Manager::MEDIA,
        ]);


        $this->add_control('items', [
            'label' => 'Itens da Lista',
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
        ]);

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="meios-canais-widget">
            <div class="mc-sidebar">
                <div class="mc-line-indicator"></div>
                <?php foreach ($settings['items'] as $index => $item): ?>
                    <div class="mc-item" data-index="<?php echo $index; ?>"><?php echo $item['item_title']; ?></div>
                <?php endforeach; ?>
            </div>
            <div class="mc-content">
                <div class="mc-header">
                    <h5><?php echo $settings['subtitle']; ?></h5>
                    <h2><?php echo $settings['title']; ?></h2>
                </div>
                <div class="mc-details">
                    <?php foreach ($settings['items'] as $index => $item): ?>
                        <div class="mc-panel" data-index="<?php echo $index; ?>" style="<?php echo $index === 0 ? '' : 'display:none;'; ?>">
                            <div class="mc-panel-inner">
                                <div class="mc-panel-text">
                                    <h3><?php echo $item['item_title']; ?></h3>
                                    <p><?php echo $item['item_description']; ?></p>
                                </div>
                                <div class="mc-panel-image">
                                    <?php if (!empty($item['item_image']['url'])): ?>
                                        <div class="circle-bg"></div>
                                        <img src="<?php echo $item['item_image']['url']; ?>" alt="">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
<?php
    }
}
