            case '/favicon.ico':
                header( 'Content-type: image/vnd.microsoft.icon' );
                echo base64_decode( '%%FILE:favicon.ico%%' );
                break;
