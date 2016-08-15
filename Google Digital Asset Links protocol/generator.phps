            case '/.well-known/assetlinks.json':
                header( 'Content-type: application/json' );
                echo base64_decode( '%%FILE:.well-known/assetlinks.json%%' );
                break;
