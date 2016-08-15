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
