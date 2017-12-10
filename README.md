## Purpose
This repository was created to simplify the SWF-based JSON CSRF exploitation. It should work also with XML data using optional parameters.

## Instructions
The .swf file take 3 required and 2 optional parameters:
1) **jsonData** - apparently, JSON Data:) Can be other type of data, if optional `ct` param specified.
2) **php_url** - URL of the 307 redirector php file.
3) **endpoint** - target endpoint, which is vulnerable to CSRF.
4) **ct** (optional) - specify your own Content-Type. Without this parameter it will be `application/json`
5) **reqmethod** (optional) - specify your own request method. Without this parameter it will be `POST`

Place test.swf and test.php on your host, then simply call the SWF file with the correct parameters.

**(As mentioned by [@ziyaxanalbeniz](https://twitter.com/ziyaxanalbeniz)) - we actually don't need crossdomain.xml from this repo, if test.php and test.swf are on same domain). Place it on your host if you also testing locally or across different domains.**

Example call:
```
http[s]://[yourhost-and-path]/test.swf?jsonData=[yourJSON]&php_url=http[s]://[yourhost-and-path]/test.php&endpoint=http[s]://[targethost-and-endpoint]
```
e.g.
https://example.com/test.swf?jsonData={"test":1}&php_url=https://example.com/test.php&endpoint=https://sometargethost.com/endpoint


If you have the questions regarding this repository - ping me in the Twitter: [@h1_sp1d3r](https://twitter.com/h1_sp1d3r)

## Cross Browser Testing

This project is tested on following browsers as follows:

![1x](https://user-images.githubusercontent.com/24297694/31861974-dd74a5ce-b73e-11e7-8546-49e1fa29e991.JPG)

Notes: ✓ - Works, X - doesn't work

If direct link to flash file doesn't work try embedding as follows:
```
<embed src='path_to_swf'></embed>
```



## Thanks
Special thanks to the [@emgeekboy](https://twitter.com/emgeekboy), who inspired me to make this repository, and [@hivarekarpranav](https://twitter.com/hivarekarpranav), who did the cross-browser and request methods research.
Related blog posts about this: 
* http://www.geekboy.ninja/blog/exploiting-json-cross-site-request-forgery-csrf-using-flash/
* http://research.rootme.in/forging-content-type-header-with-flash/
* http://resources.infosecinstitute.com/bypassing-csrf-protections-fun-profit/#gref


## Disclaimer
This repository is made for educational and ethical testing purposes only. Usage for attacking targets without prior mutual consent is illegal.
By using this testing tool you accept the fact that any damage (dataleak, system compromise, etc.) caused by the use of this tool is your responsibility.

## FAQ
1. Can we read response from server?

 Answer: no. Because of SOP. Still, if crossdomain.xml on the target host exist, and misconfigured - in this case yes.
 
2. Does it work with requests other than GET/POST?

 Answer: no.
 
3. Does it possible to craft custom headers like X-Requested-With, Origin or Referrer?

 Answer: no (it was possible in the past, but not now).

## Update
Starting with Chrome 62, direct link to SWF file may not work. If this behavior happens, use custom HTML page with this, or any other embedding method:
```
<embed src='http[s]://[yourhost-and-path]/test.swf?jsonData=[yourJSON]&php_url=http[s]://[yourhost-and-path]/test.php&endpoint=http[s]://[targethost-and-endpoint]'></embed>
```

## Commits, PRs and bug reports are welcome!
