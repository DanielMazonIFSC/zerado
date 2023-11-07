<?php 
// Adicionaremos retornos de chamada aqui à medida que adicionamos recursos ao nosso tema.
defined('MOODLE_INTERNAL') || die();

/**
 * Retorna o conteúdo principal do SCSS.
 *
 * @param theme_config $theme O objeto de configuração do tema.
 * @return string
 */
function theme_zerado_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    if ($filename == 'default.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/zerado/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/zerado/scss/preset/plain.scss');
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_zerado', 'preset', 0, '/', $filename))) {
        $scss .= $presetfile->get_content();
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_zerado', 'preset', 0, '/', $filename))) {
        $scss .= $presetfile->get_content();
    } else {
        // Reserva de segurança - talvez novas instalações, etc.
        $scss .= file_get_contents($CFG->dirroot . '/theme/zerado/scss/preset/default.scss');
    }                                                                                                        
                                                                                                                                    
    // Pré CSS - é carregado APÓS qualquer pressão da configuração, mas antes do scss principal.                                    
    $pre = file_get_contents($CFG->dirroot . '/theme/photo/scss/pre.scss');                                                         
    // Post CSS - é carregado APÓS o scss principal, mas antes do scss extra da configuração.                                 
    $post = file_get_contents($CFG->dirroot . '/theme/photo/scss/post.scss');                                                       
                                                                                                                                    
    // Combina tudo.                                                                                                      
    return $pre . "\n" . $scss . "\n" . $post;                                                                                      
}