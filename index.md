# SNSAPI -- Your Fist Hop To Reshape the Landscape of SNS!

## Quick Links

   * SNSAPI website: [https://snsapi.ie.cuhk.edu.hk/](https://snsapi.ie.cuhk.edu.hk/)
   * Github repository: [https://github.com/uxian/snsapi](https://github.com/uxian/snsapi)

## Demo

```
>>> auth()
[INFO][20120911-163533]Read saved token for 'sina_account_1' successfully
[INFO][20120911-163533]Read saved token for 'qq_account_1' successfully
[INFO][20120911-163533]Read saved token for 'renren_account_1' successfully
>>> sl = home_timeline(2)
[INFO][20120911-163552]Read 2 statuses from 'renren_account_1'
[INFO][20120911-163552]Read 6 statuses
>>> print sl
[创意铺子] at Tue Sep 11 16:30:10 +0800 2012 
  女孩纸们看看哪款香水适合你？
[百度开发者中心] at Tue Sep 11 16:27:57 +0800 2012 
  百度技术沙龙第三十期：网页展示新技术实践（9月15日 周六）http://t.cn/zWgpOhE
[wj_xlt] at 1347351357 
  【外交掠影】9月7日，中国新任驻乍得大使胡志强在乍得总统府向乍总统代比递交国书。代比总统对胡大使履新表示欢迎，并希望乍中双方进一步丰富合作内涵，推动更多中国企业在乍发展。<a href="http://url.cn/519bG3" target="_blank">http://url.cn/519bG3</a> 
[xylzx2011] at 1347350990 
  【那英合肥“惊艳”开唱 甘当绿叶几度哽咽】9月8日晚，歌坛天后@那英 来到合肥举办个人演唱会，当天那英一改往日形象，带着金色假发、穿着透视装登台。演唱会当晚合肥正下着大雨，但这并没有减低歌迷们的热情。现场座无虚席，歌迷们更是一起随着音乐挥舞着荧光棒。 <a href="http://url.cn/6iafBP" target="_blank">http://url.cn/6iafBP</a> 
[xxx] at 2012-09-11 13:53:58 
  xxx
[xxx] at 2012-09-11 13:37:43 
  xxx
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
>>> save_config()
[INFO][20120911-164515]save configs done
>>> quit()
```

```
$echo -e 'load_config()\nauth()\nprint home_timeline(10)' | python -i snscli.py -c | grep "snsapi_test" -A 1
>>> [INFO][20120911-165746]Read configs done. Add 1 channels
>>> [INFO][20120911-165746]Read saved token for 'sina_account_1' successfully
>>> [INFO][20120911-165748]Read 10 statuses
>>> 
[snsapi_test] at Tue Sep 11 16:39:46 +0800 2012 
  test
```

## What's Next
