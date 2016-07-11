https://technet.microsoft.com/en-us/library/cc511507.aspx

1. HTTPS POST: https://domain/autodiscover/autodiscover.xml
1. HTTPS POST: https://autodiscover.domain/autodiscover/autodiscover.xml
1. Attempt local XML discovery and use the XML found on the local computer if it exists.
1. HTTP GET: http://autodiscover.domain/autodiscover/autodiscover.xml (only to follow redirects, not to obtain settings)
1. DNS SRV lookup: _autodiscover._tcp.domain (only to follow the redirect to which the SRV resource record points)
