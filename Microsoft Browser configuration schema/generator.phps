            case '/browserconfig.xml':
                header( 'Content-type: application/xml' );
                echo base64_decode( '%%FILE:browserconfig.xml%%' );
                break;
