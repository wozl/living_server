# livingServer

---
##项目简介
> livingServer是一个基于laravel框架搭建的php后端服务，目前使用的版本为laravel8.4。创建该项目是本人为了复习laravel和学习vue创建的，仅供学习使用。

下面开始介绍本项目所有的对外服务api详情

## 1. createUser  --创建用户(POST,GET)
请求参数：

|参数名|参数类型|说明|备注|
|----|----|----|----|
|username|string|用户名||
|password|string|密码||

返回参数:

|参数名|参数类型|说明|备注|
|----|----|----|----|
|code|int|状态码||
|msg|string|返回信息||
例如:
``` json
{"code":200,"msg":"创建成功！"}
```

## 2. login  --用户登录 (POST)
请求参数:

|参数名|参数类型|说明|备注|
|----|----|----|----|
|username|string|用户名||
|password|string|密码||

返回参数：

|参数名|参数类型|说明|备注|
|----|----|----|----|
|code|int|状态码||
|msg|string|返回信息||
例：
``` json
{"code":205,"msg":"用户不存在!"}
```

## 3. updatePwd  --修改密码(POST)
请求参数:

|参数名|参数类型|说明|备注|
|----|----|----|----|
|username|string|用户名||
|password|string|密码||

返回参数:

|参数名|参数类型|说明|备注|
|----|----|----|----|
|code|int|状态码||
|msg|string|返回信息||
例如:
``` json
	{"code":200,"msg":"密码更新成功!"}
```

## 4. addLive  --新增直播地址(POST)
请求参数：

|参数名|参数类型|说明|备注|
|----|-----|----|----|
|name|string|电视台名称|必须|
|url|string|播放地址|必须|
|remarks|string|备注|必须(该字段是该电视台缩写-配置文件唯一索引)|
|icon|string|台标|非必须|
***`remarks`***该字段是为了生成动态配置文件时仅对该电视台的唯一标识，例如湖北电视台备注为hbtv
***`icon`***该字段是为了给前端返回电视台logo图标的名称，但是由于这个素材需要版权并且没有找到合适的图标，就放弃了，非必须的字段

----
返回参数：

|参数名|参数类型|说明|备注|
|----|----|----|----|
|code|int|状态码||
|msg|string|返回信息||
例如:
``` json
{"code":200,"msg":"新增频道成功!"}
```



## 5.updateLiveInfo  --更新直播地址(POST)

请求参数:

|参数名|参数类型|说明|备注|
|----|----|----|----|
|id|int|表数据索引|必须|
|name|string|电视台名称|必须|
|url|string|直播地址|必须|
|remarks|string|备注|必须|
|icon|string|台标|可选|

返回参数：

|参数名|参数类型|说明|备注|
|----|----|----|----|
|code|int|状态码||
|msg|string|返回信息||
例如：
```json
{"code":200,"msg":"频道信息更新成功!"}
```

##  6. getUrlInfo  --获取所有直播地址(支持条件检索查询和分页)(GET,POST)

请求参数：

|参数名|参数类型|说明|备注|
|----|----|----|----|
|pageNum|int|当前页面|必须|
|pageSize|int|每页数据条数|必须|
|query|string|查询条件|可选|
|startTime|int|开始时间|可选|
|endTime|int|结束时间|可选|

***`说明:`***
***query***为页面搜索的查询条件
***startTime***为查询条件的开始时间
***endTime***为查询时间的结束时间
`该接口中当只有查询条件时，不包含开始和结束时间，仅对该搜索条件进行查询。当有查询条件和开始时间的时候，仅查询大于等于开始时间范围内的符合查询条件的数据。当有结束时间和查询条件时，仅查询结束时间之前符合查询条件的数据。当有开始时间和结束时间的时候，查询这段时间内符合查询条件的数据。当有开始时间，不包含结束时间和查询条件时，查询开始时间后的所有数据。当有结束时间时，不包含开始时间和查询条件时，仅查询结束时间之前的所有数据。当三个条件都不存在时，默认查询所有数据。`
该接口未制作开始时间到结束时间时间范围内，不包含查询条件范围查询， 感兴趣的的可以自行新增该条件，就当是给各位预留的小作业吧，嘿嘿。

-----

## 7.downloadConfigFile  --下载动态配置文件(GET)
直接请求，返回文件流

## 8. DelLiveInfo  --根据id删除频道信息（POST）

请求参数:

|参数名|参数类型|说明|备注|
|----|----|----|----|
|id|int|频道id|必须|

返回参数:

|参数名|参数类型|说明|备注|
|----|----|----|----|
|code|int|状态码||
|msg|string|返回信息||
例如:
``` json
{"code":200,"msg":"删除成功!"}
```

## 9.  menuInfo  --查询指定字段数据(GET,POST)
返回参数：

|参数名|参数类型|说明|备注|
|----|----|----|----|
|id|int|数据表索引||
|name|string|电视台名称||
|remarks|string|电视台缩写(唯一)||
|icon|string|台标||
`该接口查询有限字段是用于前台播放页面使用，remarks是请求后台nginx动态配置文件中的子目录的url`

---------------
#项目目录
app->Http->Controllers->Web 该路径为api控制器类的目录<br/>

app->Models 该目录为数据库表实体类目录，配置数据库对应类字段在该目录下<br/>

config该目录下为laravel框架的配置目录，可配置数据库连接信息和日志记录等，该目录下我新建了一个responsecode.php的文件，用于自定义返回给前端的信息。其中databases.php里面我配置了数据库连接信息，各位可自行根据自己的情况进行修改。同时数据库信息还需要配置到项目的.env配置文件中，两个地方都需要进行配置。<br/>

routes 该目录为laravel路由跳转配置目录，也就是前端请求的路径在该目录下的web.php进行配置。当然旧版本的laravel是没有这个web.php的，之前的都是在app->Http->routes.php里面配置的。<br/>

storage 目录是laravel目录的存储文件的目录，该目录可存放按天生成日志或者你自己给外界提供下的文件，都可以存放在此处。这里我在storage->app->public 默认存储目录中新建了一个download目录，用于存放动态生成的配置文件，用于web端请求下载该文件。在该目录的路径下，我还有个模板文件，名称为`model.txt`。<br/>

项目根目录中的tv_live.sql是本项目的mysql数据库的文件，需要部署时使用数据库工具新建tv_live后运行该sql文件即可。