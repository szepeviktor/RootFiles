<?php

$query_path = explode( '?', $_SERVER['REQUEST_URI'] );
rootfiles_generate( $query_path[0] );

function rootfiles_generate( $path ) {

    $autodiscover_tpl = '<?xml version="1.0" encoding="utf-8" ?>
<Autodiscover xmlns="http://schemas.microsoft.com/exchange/autodiscover/responseschema/2006">
    <Response xmlns="http://schemas.microsoft.com/exchange/autodiscover/outlook/responseschema/2006a">
        <User>
            <DisplayName>%%DisplayName%%</DisplayName>
        </User>
        <Account>
            <AccountType>email</AccountType>
            <Action>settings</Action>
            <Image>%%Image%%</Image>
            <ServiceHome>%%ServiceHome%%</ServiceHome>
            <Protocol>
                <Type>IMAP</Type>
                <Server>%%Server1%%</Server>
                <Port>%%Port1%%</Port>
                <LoginName>%%LoginName1%%</LoginName>
                <DomainRequired>off</DomainRequired>
                <DomainName></DomainName>
                <SPA>off</SPA>
                <SSL>%%SSL1%%</SSL>
                <AuthRequired>on</AuthRequired>
                <UsePOPAuth>off</UsePOPAuth>
            </Protocol>
            <Protocol>
                <Type>SMTP</Type>
                <Server>%%Server2%%</Server>
                <Port>%%Port2%%</Port>
                <LoginName>%%LoginName2%%</LoginName>
                <DomainRequired>off</DomainRequired>
                <DomainName></DomainName>
                <SPA>off</SPA>
                <SSL>%%SSL2%%</SSL>
                <AuthRequired>on</AuthRequired>
            </Protocol>
        </Account>
    </Response>
</Autodiscover>
';

    switch ( $path ) {
        case '/autodiscover/autodiscover.xml':
            $autodiscover = array(
                'DisplayName'   => 'Email fiók',
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
            header( 'Content-type: application/xml' );
            echo rootfiles_render( $autodiscover_tpl, $autodiscover );
            break;
        default:
            // Unknown path
            error_log( 'RootFiles: Unknown path ' . $path );
            exit;
            break;
    }
}

function rootfiles_render( $template, $values ) {

    $output = $template;
    foreach ( $values as $key => $value ) {
        $tag = sprintf( '%%%%%s%%%%', $key );
        $output = str_replace( $tag, $value, $output );
    }

    return $output;
}
