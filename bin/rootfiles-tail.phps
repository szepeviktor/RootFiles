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
