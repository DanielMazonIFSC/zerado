<?php      
defined('MOODLE_INTERNAL') || die();         
        
// Configurações no painel administrativo em: / Aparência / Temas / Configurações do tema zerado   
if ($ADMIN->fulltree) {
        
// Página de configurações que divide as configurações em abas separadas.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingzerado', get_string('configtitle', 'theme_zerado'));
        
    // Cada página é uma guia – a primeira é a guia “Geral”.
    $page = new admin_settingpage('theme_zerado_general', get_string('generalsettings', 'theme_zerado'));    
        
    // Replique a configuração predefinida do boost.       
    $name = 'theme_zerado/preset';
    $title = get_string('preset', 'theme_zerado');         
    $description = get_string('preset_desc', 'theme_zerado');
    $default = 'default.scss';   

    // Listamos os arquivos em nossa própria área de arquivos para adicioná-los ao menu suspenso. 
    // Forneceremos nossa própria função para carrega todos os presets dos caminhos corretos.    
    $context = context_system::instance();   
    $fs = get_file_storage();    
    $files = $fs->get_area_files($context->id, 'theme_zerado', 'preset', 0, 'itemid, filepath, filename', false);       
        
    $choices = [];   
    foreach ($files as $file) {  
        $choices[$file->get_filename()] = $file->get_filename();      
    }   
    // Estas são as predefinições integradas do Boost.      
    $choices['default.scss'] = 'default.scss';            
    $choices['plain.scss'] = 'plain.scss';   
        
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);        
        
    // Configuração de arquivos predefinidos.  
    $name = 'theme_zerado/presetfiles';       
    $title = get_string('presetfiles','theme_zerado');     
    $description = get_string('presetfiles_desc', 'theme_zerado');     
        
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,    
        array('maxfiles' => 20, 'accepted_types' => array('.scss'))); 
    $page->add($setting);     

    // Variável $brand-color.
    // Usamos um valor padrão vazio porque a cor padrão deve vir da predefinição.
    $name = 'theme_zerado/brandcolor';        
    $title = get_string('brandcolor', 'theme_zerado');     
    $description = get_string('brandcolor_desc', 'theme_zerado');      
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');          
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);        
        
    // Deve adicionar a página depois de definir todas as configurações!
    $settings->add($page);       
        
    // Configurações avançadas.     
    $page = new admin_settingpage('theme_zerado_advanced', get_string('advancedsettings', 'theme_zerado'));  
        
    // SCSS bruto a ser incluído antes do conteúdo.          
    $setting = new admin_setting_configtextarea('theme_zerado/scsspre',
        get_string('rawscsspre', 'theme_zerado'), get_string('rawscsspre_desc', 'theme_zerado'), '', PARAM_RAW);         
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);        
        
    // SCSS bruto a ser incluído após o conteúdo.
    $setting = new admin_setting_configtextarea('theme_zerado/scss', get_string('rawscss', 'theme_zerado'),  
        get_string('rawscss_desc', 'theme_zerado'), '', PARAM_RAW);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);        
        
    $settings->add($page);       
}