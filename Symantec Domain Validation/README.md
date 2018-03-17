# Symantec Domain Validation

File Authentication/Random String Method for certificate issuance,
the file contains an MD5 hash.

| Data          |               |
| ------------- | ------------- |
| file name     | fileauth.txt  |
| type          | TEXT          |
| specification | [Symantec domain validation processes](https://www.websecurity.symantec.com/theme/ballot169) |
| requirements  | [CA/Browser Forum](https://cabforum.org/baseline-requirements-documents/) |

Must be in the `/.well-known/pki-validation` directory.
