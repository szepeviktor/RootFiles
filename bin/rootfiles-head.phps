<?php
/**
 * Handle requests for important files in the document root which get downloaded without links.
 *
 * @package RootFiles
 * @version 1.0.3
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
    public function __construct() {

        if ( ! array_key_exists( 'REQUEST_URI', $_SERVER ) ) {
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
        header( 'X-Robots-Tag: noindex, nofollow', true );

        switch ( $path ) {
            // Case parts from "generator.phps" files
