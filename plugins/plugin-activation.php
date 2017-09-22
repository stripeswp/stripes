<?php
require_once get_template_directory() . '/plugins/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'stripes_register_required_plugins' );
function stripes_register_required_plugins() {
$plugins = array(
array(
'name'      => 'Layers',
'slug'      => 'layers',
'required'  => false,
),
);
$config = array(
'id'           => 'stripes',
'default_path' => '',
'menu'         => 'install-plugins',
'has_notices'  => true,
'dismissable'  => true,
'dismiss_msg'  => '',
'is_automatic' => true,
'message'      => '',
);
tgmpa( $plugins, $config );
}