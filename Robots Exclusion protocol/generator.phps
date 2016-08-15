            case '/robots.txt':
                header( 'Content-type: text/plain' );
                echo base64_decode( '%%FILE:robots.txt%%' );
                break;
