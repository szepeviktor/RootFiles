#!/bin/bash
#
# Generate rootfiles.php
#
# VERSION       :0.1.0
# PLACEHOLDER   :%%FILE:path/file.ext%%

set -e

# Check project directory
[ -f "../LICENSE" ]

{
    # Top part of script
    cat "rootfiles-head.phps"

    # List all PHP generators
    find .. -maxdepth 2 -type f -name "generator.phps" -print0 \
        | while read -r -d $'\0' PHP_SOURCE; do
            # Skip if contains no file placeholder
            if ! grep -q "%%FILE:[^%]\+%%" "$PHP_SOURCE"; then
                # Echo PHP source
                cat "$PHP_SOURCE"
                continue
            fi

            # Get file placeholders
            FILES="$(sed -n -e 's|^.*%%FILE:\([^%]\+\)%%.*$|\1|p' < "$PHP_SOURCE")"
            # Replace each one with base64 encoded content
            while read -r FILE; do
                FILE="$(dirname "$PHP_SOURCE")/${FILE}"
                if ! [ -f "$FILE" ]; then
                    echo "File not found: ${FILE}" 1>&2
                    exit 1
                fi

                BASE64="$(base64 -w 0 < "$FILE")"
                # Echo PHP source
                sed -e "s|%%FILE:[^%]\+%%|${BASE64}|" < "$PHP_SOURCE"
            done <<< "$FILES"
    done

    # Bottom part of script
    cat "rootfiles-tail.phps"
} > ../dist/rootfiles.php

# Check script error
php -l ../dist/rootfiles.php
