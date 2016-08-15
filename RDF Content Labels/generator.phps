            case '/labels.rdf':
                header( 'Content-type: application/rdf+xml' );
                echo base64_decode( '%%FILE:labels.rdf%%' );
                break;
