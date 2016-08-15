# Thunderbird Autoconfiguration file

The config file that the Mozilla ISPDB and config services at ISPs return.
It is XML, with a clearly defined format, to be stable and usable by other mail clients, too.

| Data          |               |
| ------------- | ------------- |
| file name     | config-v1.1.xml |
| type          | XML             |
| specification | [Thunderbird Autoconfiguration](https://wiki.mozilla.org/Thunderbird:Autoconfiguration:ConfigFileFormat) |

Must be in the `/.well-known/autoconfig/mail` directory.

### Thunderbird URL check order

1. `http://autoconfig.example.com/mail/config-v1.1.xml?emailaddress=user@example.com`
1. `http://example.com/.well-known/autoconfig/mail/config-v1.1.xml`
