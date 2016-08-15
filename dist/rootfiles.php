<?php

new RootFiles();

/**
 * Serve root files.
 */
class RootFiles {

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
            case '/favicon.ico':
                header( 'Content-type: image/vnd.microsoft.icon' );
                echo base64_decode( 'AAABAAEAAQEAAAEAIAAwAAAAFgAAACgAAAABAAAAAgAAAAEAIAAAAAAABAAAAAAAAAAAAAAAAAAAAAAAAAD/////AAAAAA==' );
                break;
            case '/robots.txt':
                header( 'Content-type: text/plain' );
                echo base64_decode( 'VXNlci1BZ2VudDogKgpEaXNhbGxvdzogLwojIFBsZWFzZSBzdG9wIHNlbmRpbmcgZnVydGhlciByZXF1ZXN0cy4K' );
                break;
            case '/autodiscover/autodiscover.xml':
                header( 'Content-type: application/xml' );
                echo base64_decode( 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiID8+CjxBdXRvZGlzY292ZXIgeG1sbnM9Imh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vZXhjaGFuZ2UvYXV0b2Rpc2NvdmVyL3Jlc3BvbnNlc2NoZW1hLzIwMDYiPgogPFJlc3BvbnNlIHhtbG5zPSJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL2V4Y2hhbmdlL2F1dG9kaXNjb3Zlci9vdXRsb29rL3Jlc3BvbnNlc2NoZW1hLzIwMDZhIj4KIDwvUmVzcG9uc2U+CjwvQXV0b2Rpc2NvdmVyPgo=' );
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
     * Render template.
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
