#!/bin/bash
#
# Generate Apache config.
#
# VERSION       : 0.1.0

# Default document root
DOC_ROOT="${1:-/var/www}"

set -e

# Check project directory
[ -f "../LICENSE" ]

# Generate vhost configuration file
find .. -maxdepth 2 -type f -name ".path" -exec cat "{}" ";" \
    | sed -e "s|^.*\$|    Alias \"&\" ${DOC_ROOT}/rootfiles.php|" \
    > ../dist/rootfiles.conf
echo "rootfiles.conf - OK"

# Generate directory configuration file (.htaccess)
{
    cat <<EOF
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond "%{REQUEST_FILENAME}" !-f
EOF

    find .. -maxdepth 2 -type f -name ".path" -exec cat "{}" ";" \
        | sed -e 's|^/\(.*\)$|    RewriteCond "%{REQUEST_URI}" "=\1" \[OR\]|' \
        | sed -n -e '${s/ \[OR\]$//;p;x;d}; 1,$p'

    cat <<EOF
    RewriteRule "^" "/rootfiles.php" [END]
</IfModule>
EOF
} > ../dist/.htaccess
echo ".htaccess - OK"
