#!/bin/bash
#
# Make a release.
#

# Bump version in bin/rootfiles-head.phps

set -e

(
    cd bin/
    ./generate-apache-httpd-configs.sh
    ./generate-php-script.sh
)

VERSION="$(sed -n -e 's|^.*\* @version \(.\+\)$|\1|p' dist/rootfiles.php)"
RELEASE_ARCHIVE="RootFiles-${VERSION}.zip"

[ -f "$RELEASE_ARCHIVE" ] && rm -f "$RELEASE_ARCHIVE"

mkdir RootFiles
cp dist/.htaccess dist/rootfiles.php RootFiles/
zip -q -r "$RELEASE_ARCHIVE" RootFiles/
rm -rf RootFiles/

echo "OK."
