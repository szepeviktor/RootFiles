            case '/.well-known/autoconfig/mail/config-v1.1.xml':
                header( 'Content-type: application/xml' );
                echo base64_decode( '%%FILE:.well-known/autoconfig/mail/config-v1.1.xml%%' );
                break;
