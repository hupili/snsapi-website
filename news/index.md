# SNSAPI News

## Quick Links

   * [Back to Home](../index.html)

## What's New

### 20121204. SNSAPI 0.3 is released. 

From 0.2 to 0.3, a lot of micro improvements take place. 
During this time, one representative app 
[SNSRouter](https://github.com/hupili/sns-router)
is developed. 
Many modifications are based on the feedback from SNSRouter.

Big changes in 0.3:

   * Restructure nested Message class, 
   allowing them to be pickled. 
   * Fault tolerant auth flow. 
   * Fault tolerant HTTP request/response. 

Minor functional changes in 0.3:

   * A `report_time` decorator is added to `utils`.
   You can use it to get execution time of functions. 
   * A `require_authed` decorator is added to `snsbase`. 
   Plugin developers should put it before the methods, 
   whose invokation require a authed state. 
   * Fix Tencent Weibo html entity problem. 
   The texts in Message object is unified to have html entities unescaped. 

### 20121027. SNSAPI 0.2 is released. 

Big changes in 0.2:

   * New platform reference mechanism. 
   Support trial platforms. 
   * One module file -> multiple platforms. 
   This allows better code reuse. 
   * Message class is re-designed. 
   * Three levels of Message dump methods for different application. 
   * Add SQLite platform. 
   * Add Email platform. 
   * Add Twitter platform. 

### 20121027. The second round of restructuring is done. 

We merged the 'dev' branch to 'master' today. 
The second round of restructuring is done. 
There are yet some other enhancements to be done, 
especially for those newly added platforms. 

### 20121019. We are under intensive reconstruction!

For those who want to catch up with the latest progress, 
please checkout the	`dev` branch!

We are under intensive reconstruction and it's almost done. 

Two new platforms are enabled:

   * SQLite. 
   * TwitterStatus

They are in the `plugin_trial` directory. 
So you have to enable trial plugin first. 
Please see `snsapi/platform.py` for the instructions of 
how to enable trial plugins. 

### 20120928. The blog site is up. 

Everyone can add a blog post using Github. Just fork the 
[snsapi-website](https://github.com/hupili/snsapi-website)
repository, add you articles there and issue a pull request.
We appreciate well-written posts on any related topic. e.g. 
Why SNSAPI is important; 
Your (probably) bad experience with current SNSs; 
What's your experience with SNSAPI;
The vista you'd like to share regarding 
Decentralised Social Network, Federated Social Network, etc. 
Of course, constructive criticisms are also highly appreciated. 
e.g. How the codes should be improved;
How to design a better framework;
This project is re-inventing wheels -- point us to the priors, etc. 

### 20120927. We handled the first pull request on Github. 

It's a good first step towards community driven project!

### 20120927. News page is setup.

----------------

Last Compile At: 
{evermd:var:begin}
now
{evermd:var:end}

{evermd:var:begin}
evermd
{evermd:var:end}
