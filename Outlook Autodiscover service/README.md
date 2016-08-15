# Outlook Autodiscover service

Autodiscover in Outlook is an XML file that is put in one of two locations, based on the domain name provided by the user.

| Data          |               |
| ------------- | ------------- |
| file name     | autodiscover.xml |
| type          | XML              |
| specification | [Title](https://technet.microsoft.com/en-us/library/cc511507.aspx) |

Must be in the `/autodiscover` directory.

### Autodiscover transaction summary

1. HTTPS POST: `https://domain/autodiscover/autodiscover.xml`
1. HTTPS POST: `https://autodiscover.domain/autodiscover/autodiscover.xml`
1. Attempt local XML discovery and use the XML found on the **local computer** if it exists.
1. HTTP GET: `http://autodiscover.domain/autodiscover/autodiscover.xml` (only to follow redirects, not to obtain settings)
1. DNS SRV lookup: `_autodiscover._tcp.domain` (only to follow the redirect to which the SRV resource record points)
