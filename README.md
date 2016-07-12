# Files in the document root of the webserver

@TODO

- /bare-bone content
- full fledged /example

### Apache alias files

1. Generate `find . -name ".alias" -exec cat "{}" ";"`
1. Substitute `@@ROOTFILE-GENERATOR@@` e.g. `/path/to/rootfiles.php`

### 404 handling

See https://github.com/szepeviktor/wordpress-plugin-construction/blob/master/404-adaptive.php

Based on https://github.com/mathiasbynens/small
