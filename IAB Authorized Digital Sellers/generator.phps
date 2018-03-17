            case '/ads.txt':
                header( 'Content-type: text/plain' );
                echo base64_decode( '%%FILE:ads.txt%%' );
                break;
