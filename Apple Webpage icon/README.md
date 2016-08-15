# Apple Webpage icon

You may want users to be able to add your web application or webpage link
to the Home screen. These links, represented by an icon, are called Web Clips.

For iOS and Android device.

| Data          |               |
| ------------- | ------------- |
| file name     | apple-touch-icon.png |
| type          | PNG                  |
| specification | [Webpage Icon for Web Clip](https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html) |
| tutorial      | [Everything about touch icons](https://mathiasbynens.be/notes/touch-icons) |

### HTML head link

```html
<link rel="apple-touch-icon" href="/path/to/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="76x76" href="/path/to/apple-touch-icon-76x76.png">
```

### Create

```bash
convert -size 1x1 canvas:white apple-touch-icon.png
optipng -strip all apple-touch-icon.png
cat .path | xargs -n 1 cp -v apple-touch-icon.png
```
