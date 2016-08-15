<?php
/**
 * Handle requests for important files in the document root which get downloaded without links.
 *
 * @package RootFiles
 * @version 1.0.0
 * @license MIT
 * @author Viktor Szépe <viktor@szepe.net>
 */

new RootFiles();

/**
 * Serve root files.
 */
final class RootFiles {

    /**
     * Process request URI.
     */
    public function __contruct() {

        if ( ! in_array( 'REQUEST_URI', $_SERVER ) ) {
            return;
        }

        $query_path = explode( '?', $_SERVER['REQUEST_URI'] );
        $this->generate( $query_path[0] );
    }

    /**
     * Respond to HTTP requests.
     */
    public function generate( $path ) {

        // Don't index these contents
        header( 'X-Robots-Tag: noindex, nofollow' );

        switch ( $path ) {
            // Case parts from "generator.phps" files
            // Apple Webpage icon
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
                echo base64_decode( 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQAAAAA3bvkkAAAACklEQVQI12NoAAAAggCB3UNq9AAAAABJRU5ErkJggg==' );
                break;
            // Thunderbird Autoconfiguration
            case '/.well-known/autoconfig/mail/config-v1.1.xml':
                header( 'Content-type: application/xml' );
                echo base64_decode( 'PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxjbGllbnRDb25maWcgdmVyc2lvbj0iMS4xIj4KPC9jbGllbnRDb25maWc+Cg==' );
                break;
            // Sitemap protocol
            case '/sitemap.xml':
            case '/sitemap_index.xml':
                header( 'Content-type: application/xml' );
                echo base64_decode( 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHVybHNldCB4bWxucz0iaHR0cDovL3d3dy5zaXRlbWFwcy5vcmcvc2NoZW1hcy9zaXRlbWFwLzAuOSI+CiA8dXJsPgogPC91cmw+CjwvdXJsc2V0Pgo=' );
                break;
            // Microsoft Browser configuration schema
            case '/browserconfig.xml':
                header( 'Content-type: application/xml' );
                echo base64_decode( 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPGJyb3dzZXJjb25maWc+CiA8bXNhcHBsaWNhdGlvbj4KICA8dGlsZT4KICAgPHNxdWFyZTcweDcwbG9nbyBzcmM9Ii9hcHBsZS10b3VjaC1pY29uLnBuZyIvPgogICA8c3F1YXJlMTUweDE1MGxvZ28gc3JjPSIvYXBwbGUtdG91Y2gtaWNvbi5wbmciLz4KICAgPHdpZGUzMTB4MTUwbG9nbyBzcmM9Ii9hcHBsZS10b3VjaC1pY29uLnBuZyIvPgogICA8c3F1YXJlMzEweDMxMGxvZ28gc3JjPSIvYXBwbGUtdG91Y2gtaWNvbi5wbmciLz4KICA8L3RpbGU+CiA8L21zYXBwbGljYXRpb24+CjwvYnJvd3NlcmNvbmZpZz4K' );
                break;
            // Favorite icon
            case '/favicon.ico':
                header( 'Content-type: image/vnd.microsoft.icon' );
                echo base64_decode( 'AAABAAEAAQEAAAEAIAAwAAAAFgAAACgAAAABAAAAAgAAAAEAIAAAAAAABAAAAAAAAAAAAAAAAAAAAAAAAAD/////AAAAAA==' );
                break;
            // Robots Exclusion protocol
            case '/robots.txt':
                header( 'Content-type: text/plain' );
                echo base64_decode( 'VXNlci1BZ2VudDogKgpEaXNhbGxvdzogLwojIFBsZWFzZSBzdG9wIHNlbmRpbmcgZnVydGhlciByZXF1ZXN0cy4K' );
                break;
            // Outlook Autodiscover service
            case '/autodiscover/autodiscover.xml':
                header( 'Content-type: application/xml' );
                echo base64_decode( 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiID8+CjxBdXRvZGlzY292ZXIgeG1sbnM9Imh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vZXhjaGFuZ2UvYXV0b2Rpc2NvdmVyL3Jlc3BvbnNlc2NoZW1hLzIwMDYiPgogPFJlc3BvbnNlIHhtbG5zPSJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL2V4Y2hhbmdlL2F1dG9kaXNjb3Zlci9vdXRsb29rL3Jlc3BvbnNlc2NoZW1hLzIwMDZhIj4KIDwvUmVzcG9uc2U+CjwvQXV0b2Rpc2NvdmVyPgo=' );
                break;
            // Google Digital Asset Links protocol
            case '/.well-known/assetlinks.json':
                header( 'Content-type: application/json' );
                echo base64_decode( 'W3t9XQo=' );
                break;
            // RDF Content Labels
            case '/labels.rdf':
                header( 'Content-type: application/rdf+xml' );
                echo base64_decode( 'PD94bWwgdmVyc2lvbj0iMS4wIj8+Cg==' );
                break;
            // Adobe Permission
            case '/crossdomain.xml':
                header( 'Content-type: application/xml' );
                echo base64_decode( 'PD94bWwgdmVyc2lvbj0iMS4wIj8+CjwhRE9DVFlQRSBjcm9zcy1kb21haW4tcG9saWN5IFNZU1RFTSAiaHR0cDovL3d3dy5hZG9iZS5jb20veG1sL2R0ZHMvY3Jvc3MtZG9tYWluLXBvbGljeS5kdGQiPgo8Y3Jvc3MtZG9tYWluLXBvbGljeT4KIDxzaXRlLWNvbnRyb2wgcGVybWl0dGVkLWNyb3NzLWRvbWFpbi1wb2xpY2llcz0ibm9uZSIvPgo8L2Nyb3NzLWRvbWFpbi1wb2xpY3k+Cg==' );
                break;
            // Apple Association
            case '/apple-app-site-association':
            case '/.well-known/apple-app-site-association':
                header( 'Content-type: application/json' );
                echo base64_decode( 'ewogImFwcGxpbmtzIjogewogICJhcHBzIjogW10sCiAgImRldGFpbHMiOiBbXQogfQp9Cg==' );
                break;
            // END of case parts
            default:
                // Unknown path
                header( 'HTTP/1.0 404 Not Found' );
                error_log( 'RootFiles: Unknown path ' . $path );
                break;
        }
    }

    /**
     * Render a template.
     */
    private function render( $template, $values ) {

        $output = $template;
        foreach ( $values as $key => $value ) {
            $tag = sprintf( '%%%%%s%%%%', $key );
            $output = str_replace( $tag, $value, $output );
        }

        return $output;
    }
}
