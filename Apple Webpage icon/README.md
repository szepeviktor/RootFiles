# Apple Webpage icon

`apple-touch-icon.png`

For iOS and Android.

https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html

### Create

```
convert -size 1x1 canvas:white apple-touch-icon.png
optipng -strip all apple-touch-icon.png
```

https://mathiasbynens.be/notes/touch-icons

<link rel="apple-touch-icon" href="http://example.com/image.png" />
