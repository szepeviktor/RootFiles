#!/bin/bash
#
# Generate Apache config.
#

DOC_ROOT="/var/www"


find -name ".alias" -exec cat "{}" ";" \
    | sed -e "s|@@ROOTFILE-GENERATOR@@|${DOC_ROOT}/rootfiles.php|" \
    > rootfiles.conf

{
    cat <<EOF
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond "%{REQUEST_FILENAME}" !-f
EOF

    find -name ".alias" -exec cat "{}" ";" \
        | sed -e 's|Alias "\(.\+\)" "@@ROOTFILE-GENERATOR@@"|    RewriteCond "%{REQUEST_URI}" "=\1" \[OR\]|' \
        | sed -n -e '${s/ \[OR\]$//;p;x;d}; 1,$p'

    cat <<EOF
    RewriteRule "^" "/rootfiles.php" [L]
</IfModule>
EOF
} > .htaccess
