# Serve files missing from the document root

[![Build Status](https://travis-ci.org/szepeviktor/RootFiles.svg?branch=master)](https://travis-ci.org/szepeviktor/RootFiles)

Not all projects have the resources to hand-craft every *root file*.

This single PHP class generates all of them for you. Apache configuration files are also included.

This repository is modular. See **Adding a new root file** section below.

### Usage

```bash
# Clone this repo
git clone https://github.com/szepeviktor/RootFiles.git
cd RootFiles/
# Generate Apache configuration files
cd bin/
generate-apache-httpd-configs.sh /directory/for/generator-script
```

Comment out aliases for **existing files**,
include `dist/rootfiles.conf` in your site's configuration
and place `dist/rootfiles.php` at the specified path.

You're done!

### Download

If you don't have access to Apache vhost config
just download the [current release](https://github.com/szepeviktor/RootFiles/releases/latest) (`.htaccess` and `rootfiles.php`)
and place them in your site's document root.

### 404 handling

See https://github.com/szepeviktor/wordpress-plugin-construction/blob/master/404-adaptive.php

Based on https://github.com/mathiasbynens/small

### See the results

Search access log for served root files

```bash
grep -E "GET ($(sed -ne 's|^\s*Alias "\(.\+\)" /.\+$|\1|p' rootfiles.conf|paste -d"|" -s) HTTP/)" /var/log/apache2/access.log
```

### Other root files

- If users are allowed to upload files to any directory use an upload warning file found in `/_File upload warning`
- Site verification files for Google, Bing, Yandex and Baidu
- PHP user configuration `.user.ini` http://php.net/manual/en/configuration.file.per-user.php
- Apache httpd directory configuration `.htaccess` (with rewrite rules, security, compression, browser cache etc. settings)

### Alternative solution

```apache
RewriteEngine On
RewriteRule "^/apple-app-site-association$" - [R=200]
<Location "/apple-app-site-association">
    # Inline response body
    ErrorDocument 200 '{ "applinks": { "apps": [], "details": [] } }'
</Location>
```

### Adding a new root file

1. Add a `README.md` file (example below)
1. Add all the paths with leading slash in `.path`
1. Create the file with minimal contents with full path (could be in a subdirectory)
1. Add `generator.phps` with case statement (path, content type, content) you may use the `%%FILE:file.ext%%` placeholder for base64 encoded file contents
1. Optionally add full example in the `_example` directory

```markdown
# Full Name with Company and Function

Small description.

| Data          |               |
| ------------- | ------------- |
| file name     | file.ext      |
| type          | JSON          |
| specification | [Title](/URL) |
| tutorial      | [Title](/URL) |

### HTML head link

<link rel="name" />

Or: Must be in the document root.
```

### Contribution

[PR-s](https://github.com/szepeviktor/RootFiles/pulls) are welcome!
