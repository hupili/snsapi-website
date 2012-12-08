# Universal Auth Bouncer

Most of platforms of *SNSAPI* and *SNSRouter* accomplish authorization 
through a callback machenism. 
However, some of them are very restrictive in setting callback URL. 

The intersection of currently known rules are:

   * Use a publicly reachable domain name. 
   e.g. no "localhost". 
   * Do not use ":port" in the URL.

Reference:

   * See [Issue5](https://github.com/hupili/sns-router/issues/5) of *SNSRouter*. 
   The discussion on Sina Weibo. 

## Use the Bouncer

You can configure the callback URL of a platform to be:
(in `channel.json`)

```
https://snsapi.ie.cuhk.edu.hk/aux/bouncer/redir/{{HOST}}/{{PORT}}/
```

`{{HOST}}` is the hostname, e.g. `localhost`. 
`{{PORT}}` is the port number, e.g. `8080` (default for *SNSRouter*). 

For example, one can configure the callback URL of RenrenStatus platform to be:

```
https://snsapi.ie.cuhk.edu.hk/aux/bouncer/redir/localhost/8080/
```

Note that you have to configure App domain to be 
`https://snsapi.ie.cuhk.edu.hk` in order for this to work. 
(at `http://app.renren.com/developers/newapp/{{APP_ID}}/basic/setting`). 

When one authorize on Renren, the assembled callback URL looks like:

```
https://snsapi.ie.cuhk.edu.hk/aux/bouncer/redir/localhost/8080/?code=testcode
```

which will be redirected to 

```
https://localhost:8080/auth/second/?code=testcode
```

## Deploy to Another Server

You can deploy the bouncer to your own server. 
You have to choose one server who supports URL rewriting. 

You can clone full `snsapi-website` project or 
simply copy and place `redir.php` somewhere appropriate. 

### Apache

In the global `httpd.conf`, one can use the following section to 
rewrite all URLs with the pattern `aux/bouncer/redir/{{HOST}}/{{PORT}}/?{{PARAM}}` to `redir.php`. 

```
<Directory "SNSAPI_WEB_ROOT_DIR">
	Options FollowSymLinks
	AllowOverride FileInfo
	RewriteEngine on
	RewriteRule ^aux/bouncer/redir/[^/]*/[^/]*/\?[^/]*$ /aux/bouncer/redir.php [L]
</Directory>
```

`SNSAPI_WEB_ROOT_DIR` is the root of `snsapi-website` **without last slash**, 
e.g. `/var/www/snsapi-web`
