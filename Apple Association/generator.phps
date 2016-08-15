            case '/apple-app-site-association':
            case '/.well-known/apple-app-site-association':
                header( 'Content-type: application/json' );
                echo base64_decode( '%%FILE:apple-app-site-association%%' );
                break;
