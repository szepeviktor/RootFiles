#!/bin/bash
#
# Check headers of all .path files.
#
# VERSION       :0.1.1
# CI            :shellcheck apache.sh

set -e

declare -a NEEDED_HEADERS=( "HTTP/1.1 200 OK" "X-Robots-Tag: noindex, nofollow" "Content-Length:" )

DOTPATHS="$(find . -maxdepth 2 -type f -name ".path")"
test -n "$DOTPATHS"

while read -r DOTPATH; do
    # shellcheck disable=SC2094
    while read -r FILE; do
        echo "Testing ${FILE} ..."
        HEADERS="$(wget -q -S -O /dev/null "http://localhost${FILE}" 2>&1)"

        # Common headers
        for NEEDED_HEADER in "${NEEDED_HEADERS[@]}"; do
            grep -qFi "  ${NEEDED_HEADER}" <<< "$HEADERS"
        done

        # Headers from the generator
        GENERATOR="$(dirname "$DOTPATH")/generator.phps"
        DEFINED_HEADERS="$(sed -n -e "s|^.*header(\\s*['\"]\\(.\\+\\)['\"]\\s*).*\$|\\1|p" < "$GENERATOR")"
        while read -r DEFINED_HEADER; do
            grep -q -F -i "  ${DEFINED_HEADER}" <<< "$HEADERS"
        done <<< "$DEFINED_HEADERS"
    done < "$DOTPATH"
done <<< "$DOTPATHS"

ROBOTS_MD5="$(wget -q -O- "http://localhost/robots.txt" | md5sum)"
test "$ROBOTS_MD5" == "e55dbcaad4498eb71a0a1791d77d3b1c  -"

echo "OK."
