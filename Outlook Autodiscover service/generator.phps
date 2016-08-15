            case '/autodiscover/autodiscover.xml':
                header( 'Content-type: application/xml' );
                echo base64_decode( '%%FILE:autodiscover/autodiscover.xml%%' );
                break;
