# SNSAPI -- Your Fist Hop to Reshape the Landscape of SNS!

## Quick Links

   * SNSAPI website: [https://snsapi.ie.cuhk.edu.hk/](https://snsapi.ie.cuhk.edu.hk/)
   * Github repository: [https://github.com/uxian/snsapi](https://github.com/uxian/snsapi)

## Demo

### Using the CLI

"snscli" is the current interface component of SNSAPI. 
You simply invoke it with interactive Python shell. 

```
$python -i snscli.py

snscli -- the interactive CLI to operate all SNS!

Type "print helpdoc" again to see this document. 

To start your new journey, type "print tut"

Here's the command list:
   * load_config 
   * save_config 
   * list 
   * auth 
   * home_timeline 
   * update 
   * reply 
   * new_channel 

>>> 
```

Everything you do with Python is doable inside snscli. 
So you can imagine how easy it is to perform batch operations on your statuses. 
e.g. Read all new messages on Sina, 
and then selectively forward something to Renren. 
This is impossible using other GUI software. 

For those who have not used Python before:

   * Lines starting with ">>>" is the command you type in Python shell. 
   Others are outputs. 
   * You **DO NOT** need any knowledge about Python to play "snscli".  
   * You will soon find the **STDIN/STDOUT interface** of "snscli" is super convenient. 
   You can use **any language** to write the upper layer logic!

### Authenticate All Channels

Most Online Social Network (OSN) uses OAuth to authorize applications. 
Before this demo, let's assume certain configuration is done
(we will walk you through the details in the tutorial embedded in snscli). 
Use one command (a function call in Python style) to authorize all channels. 

```
>>> auth()
[INFO][20120911-163533]Read saved token for 'sina_account_1' successfully
[INFO][20120911-163533]Read saved token for 'qq_account_1' successfully
[INFO][20120911-163533]Read saved token for 'renren_account_1' successfully
```

### Read 2 Latest Messages from Each Channel

Different platforms have different terms for "new messages". 
e.g. news feed, home timeline, etc. 
Let's call all of them as **home_timeline**. 
The name for "messages" also differs.
e.g. status, message, blog, email, etc. 
Let's call all of them as **status**. 
So the following shows how you read two new statuses from each chennel. 

```
>>> sl = home_timeline(2)
[INFO][20120911-163552]Read 2 statuses from 'renren_account_1'
[INFO][20120911-163552]Read 6 statuses
```

   * Lines starting with "[xxx]" (like "[INFO]") is the log message. 
   By default, they are enabled in snscli to give users more information. 
   You can redirect log messages to a file so that the console output is more clear. 
   See the file "snsapi/snsconf.py" for more information. 

### Print Status List

Yes! 
As you already guessed, printing status list is same as printing anything else in Python!

```
>>> print sl
[创意铺子] at Tue Sep 11 16:30:10 +0800 2012 
  女孩纸们看看哪款香水适合你？
[百度开发者中心] at Tue Sep 11 16:27:57 +0800 2012 
  百度技术沙龙第三十期：网页展示新技术实践（9月15日 周六）http://t.cn/zWgpOhE
[wj_xlt] at 1347351357 
  【外交掠影】9月7日，中国新任驻乍得大使胡志强在乍得总统府向乍总统代比递交国书。代比总统对胡大使履新表示欢迎，并希望乍中双方进一步丰富合作内涵，推动更多中国企业在乍发展。<a href="http://url.cn/519bG3" target="_blank">http://url.cn/519bG3</a> 
[xylzx2011] at 1347350990 
  【那英合肥“惊艳”开唱 甘当绿叶几度哽咽】9月8日晚，歌坛天后@那英 来到合肥举办个人演唱会，当天那英一改往日形象，带着金色假发、穿着透视装登台。演唱会当晚合肥正下着大雨，但这并没有减低歌迷们的热情。现场座无虚席，歌迷们更是一起随着音乐挥舞着荧光棒。 <a href="http://url.cn/6iafBP" target="_blank">http://url.cn/6iafBP</a> 
  (... more statuses are omitted for space ...)
```

   * The object returned by `home_timeline()` ("sl" in our case)
   is derived from Python list. 
   So you can of course use the standard ways to access each element. 
   e.g. "sl[0]". 

### Update a Status

Now, let's try to update a status. 
We invoke `home_timeline()` to check whether our status is updated. 
See the following:

```
>>> update("test", channel = "sina_account_1")
[INFO][20120911-163946]Update status 'test'. Result:{'sina_account_1': True}
{'sina_account_1': True}
>>> sl = home_timeline(2, channel = "sina_account_1")
[INFO][20120911-164017]Read 2 statuses
>>> print sl
[snsapi_test] at Tue Sep 11 16:39:46 +0800 2012 
  test
[百度] at Tue Sep 11 16:38:34 +0800 2012 
  实用！把iphone调的比最大声音还大的方法[赞]
```

   * Nearly all of the batch operations of snscli allows the "channel" parameter. 
   By default, it perform the operation on all chennels. 
   You can pass in this parameter to operate only one channel. 

### Save Configurations

snscli can be configured within Python interactive shell. 
One can save configurations to file for reuse. 

```
>>> save_config()
[INFO][20120911-164515]save configs done
>>> quit()
```

   * Next time, you can use `load_config`. 
   By default, the channel config file is "conf/channel.json". 
   We have an example config "channel.json.example" under the same folder. 
   You can copy it to "channel.json" and fill in the fields accordingly. 

### Add a New Channel

SNSAPI abstract **everything** in the same way. 
You have seen a lot of RSS feeds online. 
You may have already subscribed many RSS feeds in Google Reader. 
Here is a demo of how you subscribe RSS in SNSAPI. 
We add an RSS channel on url 
[http://personal.ie.cuhk.edu.hk/~hpl011/wordpress/?feed=rss2](http://personal.ie.cuhk.edu.hk/~hpl011/wordpress/?feed=rss2)
and then read its **home_timeline**. 

```
>>> c = newc()
>>> c['platform'] = 'rss'
>>> c['url'] = 'http://personal.ie.cuhk.edu.hk/~hpl011/wordpress/?feed=rss2'
>>> c['channel_name'] = "hupili_wordpress"
>>> addc(c)
True
>>> print home_timeline(count = 3, channel = 'hupili_wordpress')
[INFO][20120921-205918]Read 3 statuses
[hpl] at Fri, 31 Aug 2012 08:03:59 +0000 
  Article "3SB Battle: My Positioning Views" is updated(published)! (http://personal.ie.cuhk.edu.hk/~hpl011/wordpress/?p=230)
[hpl] at Mon, 20 Aug 2012 10:30:01 +0000 
  Article "Apache Authenticate Using System Accounts" is updated(published)! (http://personal.ie.cuhk.edu.hk/~hpl011/wordpress/?p=227)
[hpl] at Sat, 18 Aug 2012 14:35:23 +0000 
  Article "ID-Utils and Simple Desktop Search" is updated(published)! (http://personal.ie.cuhk.edu.hk/~hpl011/wordpress/?p=224)
```

   * RSS channel can be regarded as a kind of read-only SNS. 
   * We already digested the message in the RSSStatus class. 
   Some of you must be aware that RSS do contain much richer information. 
   We have interface to export the full Status object. 
   You can also try to modify a piece of the code to diget the message in another way. 


### STDIN/STDOUT Interface

Now comes the **real power**!

   * Write your commands to STDIN. 
   * Read the result from STDOUT. 

Using linux pipe, it's very easy to implement some basic functions. 
Try following [snsapi_test](http://weibo.com/u/2862649054) on Sina Weibo
and invoke the following pipline:

```
$echo -e 'load_config()\nauth()\nprint home_timeline(10)' | python -i snscli.py -c | grep "snsapi_test" -A 1
>>> [INFO][20120911-165746]Read configs done. Add 1 channels
>>> [INFO][20120911-165746]Read saved token for 'sina_account_1' successfully
>>> [INFO][20120911-165748]Read 10 statuses
>>> 
[snsapi_test] at Tue Sep 11 16:39:46 +0800 2012 
  test
```

That's how you filter the message posted by "snsapi_test". 
You can of course write more complex logics. 
Now you have **STDIN/STDOUT**, what you can not do? 

## Try It Out!

Congratulations! You already get a overall picture of snscli. 
Now, let's enter the 10-minute step by step tutorial:

   * First you need [Python2.7](http://www.python.org/getit/releases/2.7/). 
   * Get a copy of SNSAPI: [Download SNSAPI 0.1](down/snsapi-0.1.zip); 
   Or go to [Github](https://github.com/uxian/snsapi) for latest development branch. 
   * Unzip the package and 
   
```
python -i snscli.py
```

We have integrated a tutorial in snscli. Just do the following:

```
>>> print tut
 
Section 0. Introduction
    
    This tutorial will present the basics of 
    SNSAPI to you. We'll walk you through 
    configuring, authorising, reading timeline,
    updating status, replying to one status, etc. 

    To navigate this tutorial, you need:
    >>> tut.next() # move to next section
    >>> tut.prev() # move to previous section

    Note that "print tut" is the shortcut
    to move to the next section. 

    The tutorial will loop around after it hits 
    the last section. 
```

There are 10 sections to walk you through basic operations of snsapi. 

## What's Next?

SNSAPI is more than what we presented here. 
We only present a preliminary demo of snscli for all users convenience. 
If you know how to code, please look into the project. 
Here's a few pointers:

   * Modify "snsconf.py" which contains some hardcode configurations. 
   e.g. write log to file. 
   * Look at the sample applications in "app" folder. 
   You will soon find how to write application based on Python class interface. 
   * Register one account on [Github](https://github.com/)
   and [join us](https://github.com/uxian/snsapi). 
   Contribute codes, wikis, issues, etc. 
   All are welcome. 

```
   /---  +\      |  /---        X       +---\   ---+---
  |    \ | \     | |    \      / \      |    |     |
  \      |  \    | \          /   \     |    /     |
   \---\ |   \   |  \---\    /     \    +----      |
       | |    \  |      |   ---------   |          |
  \    / |     \ | \    /  /         \  |          |
   \---  |      -+  \---  /           \ |       ---+---
```

----------------

Last Compile At: 
{evermd:var:begin}
now
{evermd:var:end}

{evermd:var:begin}
evermd
{evermd:var:end}
