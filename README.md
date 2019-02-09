# upload-download-files-php

```
Simple php scripts for downloading and uploading files.
```

## How to share files without having domain and own server?
## How to make your own PC as server?
```
No worries it even works on dynamic ip addresses and also on the networks which are having NAT enabled.
```


### Prerequisites

What things you will need?

* [XAMPP](https://www.apachefriends.org/download.html) XAMPP Suitable version with PHP Apache
* [ngrok](https://ngrok.com/) ngrok for making your localhost tunnel.

### Process

* Install XAMPP
* Download github repo and copy all files to <XAMPP-Install-Directory>/htdocs/server/
* Start XAMPP Apache
* Try running the website in browser [link](http://localhost/server)
* Make accout on [ngrok](https://ngrok.com/) and download the files.
* Start CMD in the folder where ngrok.exe is extracted
* Run the authentication command > ngrok authtoken YOUR_TOKEN
* Run the command to start tunnel > ngrok http 80
* You would see your temporary domain
* Highlight the domain and press Mouse-Right-Click (to Copy)
* Open the link in some other network, hopefully it should work.

## Terms

* The guide and scripts are for personal use only.
* Any misuse of the files provided is not encouraged.
* The developer is not responsible for any kind of warranty or harms.
* All the responsibility is of the user.
* If you agree to above mentioned terms and other terms/policies of [ngrok](https://ngrok.com/) & [XAMPP](https://www.apachefriends.org/download.html) then only use.