            case '/sitemap.xml':
            case '/sitemap_index.xml':
                header( 'Content-type: application/xml' );
                echo base64_decode( '%%FILE:sitemap.xml%%' );
                break;
