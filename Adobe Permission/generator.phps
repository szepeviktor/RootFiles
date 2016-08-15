            case '/crossdomain.xml':
                header( 'Content-type: application/xml' );
                echo base64_decode( '%%FILE:crossdomain.xml%%' );
                break;
