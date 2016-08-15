            case '/apple-touch-icon-72x72.png':
            case '/apple-touch-icon-76x76.png':
            case '/apple-touch-icon-114x114.png':
            case '/apple-touch-icon-120x120.png':
            case '/apple-touch-icon-144x144.png':
            case '/apple-touch-icon-152x152.png':
            case '/apple-touch-icon-180x180.png':
            case '/apple-touch-icon-192x192.png':
            case '/apple-touch-icon-precomposed.png':
            case '/apple-touch-icon.png':
                header( 'Content-type: image/png' );
                echo base64_decode( '%%FILE:apple-touch-icon.png%%' );
                break;
