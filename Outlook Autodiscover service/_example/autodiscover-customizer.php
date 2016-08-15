<?php

$autodiscover = array(
    'DisplayName'   => 'Email account',
    'Image'         => 'http://example.com/apple-touch-icon.png',
    'ServiceHome'   => 'http://example.com/',

    // IMAP
    'Server1'       => 'imap.example.com',
    'Port1'         => '993',
    'LoginName1'    => 'user@example.com',
    // <SSL>on | off</SSL>
    'SSL1'          => 'on',

    // SMTP
    'Server2'       => 'smtp.example.com',
    'Port2'         => '587',
    'LoginName2'    => 'user@example.com',
    // <SSL>on | off</SSL>
    'SSL2'          => 'on',
);

$autodiscover_tpl = file_get_contents( __DIR__ . '/autodiscover.tpl' );

header( 'Content-type: application/xml' );
echo rootfiles_render( $autodiscover_tpl, $autodiscover );

function rootfiles_render( $template, $values ) {

    $output = $template;
    foreach ( $values as $key => $value ) {
        $tag = sprintf( '%%%%%s%%%%', $key );
        $output = str_replace( $tag, $value, $output );
    }

    return $output;
}
