# Microsoft Browser configuration schema

Browser configuration files can be used to define pinned site customizations.

| Data          |               |
| ------------- | ------------- |
| file name     | browserconfig.xml |
| type          | XML               |
| specification | [Schema reference](https://msdn.microsoft.com/en-us/library/ie/dn320426%28v=vs.85%29.aspx) |
| tutorial      | [Creating custom tiles](https://msdn.microsoft.com/en-us/library/ie/dn455106.aspx) |
| builder       | [Build a site tile](http://www.buildmypinnedsite.com/) |

### HTML head link

```html
<meta name="msapplication-config" content="/path/to/IEconfig.xml" />
```

To stop using the configuration file, set the content attribute to `none`.

```html
<meta name="msapplication-config" content="none" />
```
