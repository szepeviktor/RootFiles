            case '/.well-known/dnt-policy.txt':
                header( 'Content-type: text/plain' );
                echo base64_decode( '%%FILE:.well-known/dnt-policy.txt%%' );
                break;
