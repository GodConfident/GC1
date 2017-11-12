---
title: 烧IT数据库设置规划
tags: 烧IT项目数据库,MARKDOWN
grammar_abbr: true
grammar_table: true
grammar_defList: true
grammar_emoji: true
grammar_footnote: true
grammar_ins: true
grammar_mark: true
grammar_sub: true
grammar_sup: true
grammar_checkbox: true
grammar_mathjax: true
grammar_flow: true
grammar_sequence: true
grammar_plot: true
grammar_code: true
grammar_highlight: true
grammar_html: true
grammar_linkify: true
grammar_typographer: true
grammar_video: true
grammar_audio: true
grammar_attachment: true
grammar_mermaid: true
grammar_classy: true
grammar_cjkEmphasis: true
grammar_cjkRuby: true
grammar_center: true
grammar_align: true
grammar_tableExtra: true
---
## 网站信息表

| 名称 | 类型| 长度 | 是否为空 | 索引  | 备注 |
|  ----   |  ---- |  ---- |--------------|--------|-------|
|   id    |  int  | 11   |      否        |       主键   |        |
| conf_title| char|255| 可以为空    |     | 项目标题|
| conf_name| char|255| 可以为空    |     | 英文名|
| conf_content| char|255| 可以为空    |     | 项目标语|
| conf_order| int|11| 可以为空    |     | 排序|
| conf_tips| char|255| 可以为空    |     | 备注|
| conf_type| varchar|255| 可以为空    |     | 表单内标签类型|
| conf_value| varchar|255| 可以为空    |     | 项目值|

CREATE TABLE `webinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `conf_title` char(255)  COMMENT '标题',
  `conf_name` char(255)  COMMENT '英文名',
  `conf_content` char(255)  COMMENT '项目标语',
  `conf_order` int(11)  COMMENT '排序',
  `conf_tips` char(255)  COMMENT '备注',
  `conf_type` varchar(255)  COMMENT '表单内标签类型',
  `conf_value` varchar(255)  COMMENT '项目值',
  PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='网站信息表';


## 用户

###  用户表 ###

| 名称 | 类型| 长度 | 是否为空 | 索引 | 注释 | 备注 |
|  ----   |  ---- |  ---- |--------------|--------|-------|-------- |
|   id    |  int  | 11   |      N        |          |        |  a_i    |
| username| varchar|33| N    |  UN   | 登陆名|       |
|password | char  | 32 | N | | 登陆密码 | |
| status | tinyint | 1 | N | |0未激活，1正常，2冻结| 默认 0 |
| phone | varchar | 12  | N   |  普通 | 手机号|  |
|  email  |  varchar  |  33| N | 普通 |  邮箱  | |
| class | tinyint| | N | 普通  | 用户分类 0普通用户 1管理员 | |
| created_at  | timestamp | 0 |  |  | 添加时间  | |
| updated_at | timestamp | 0 |  |  |  修改时间 |  |
| deleted_at  | timestamp  | 0 |  |  | 删除时间 | |

###  用户表详情表 ###

| 名称 | 类型| 长度 | 是否为空 | 索引 | 注释 | 备注 |
|  ----   |  ---- |  ---- |--------------|--------|-------|-------- |
|   id    |  int  | 11   |      N        |          |        |  a_i    |
|   uid  |   int  | 11  |      N        |           |       |          |
| nackname| varchar  | 33 |   |   |  用户昵称   | |
| age | tinyint | 1 |  |  | 年龄 |  |
| sex | tinyint  | 1|  |  | 性别 |  |
| img | varchar | 50  | N |  | 用户头像 | 默认 /src/portrait/default.jpg  |
| last_login | timestamp  |   0  |   |  | 上次登陆时间 |   |
| token | char | 30  |   |   |  验证字符串  |   |

### focus_img 轮播图 ###

| 名称 | 类型| 长度 | 是否为空 | 索引 | 注释 | 备注 |
|  ----   |  ---- |  ---- |--------------|--------|-------|-------- |
|   id    |  int  | 11   |      N        |          |        |  a_i    |
|  nid   |  int  | 11   |      N        |          | 新闻id |       |

## 新闻板块
###  category 新闻类型表  ###

| 名称 | 类型| 长度 | 是否为空 | 索引 | 注释 | 备注 |
|  ----   |  ---- |  ---- |--------------|--------|-------|-------- |
|   id    |  int  | 11   |      N        |          |        |  a_i    |
|  type | varchar |  50  |   N   |  UN  |  新闻类型    |    |

|  tstatus | char |100    |   N   |  UN  |  新闻状态    |   0 为顶级模块 1为一级模块  |
| created_at | int | 11 |  |  |  添加时间  | |
| updated_at | int | 11 |   |  | 修改时间 | |
| deleted_at | int | 11 |  |  |  删除时间  | |
|  tstatus | char |100    |   N   |  UN  |  新闻状态    |   1为显示 2为隐藏  |
	CREATE TABLE `category` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `type` varchar(255) DEFAULT NULL,
	  `bpath` varchar(255) DEFAULT NULL,
	  `tstatus` char(100) DEFAULT NULL,
	  `pid` int(11) DEFAULT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8

- 后台新闻板块判断
	<!-- - 板块显示隐藏 出错判断 -->
	<!-- - 子板块层级限制 -->
	<!-- - 二级板块数量限制		限制为10个 -->
	<!-- - 板块名不能为空 -->
	- 二级和三级板块数量限制		依据导航栏长度限制 在显示隐藏处限制
	<!-- - 有子级板块的 不给显示 状态和删除 按钮 -->

### news 新闻表 ###

| 名称 		 | 类型		 | 长度  | 是否为空 | 索引 | 注释 					|
|  ----   	 |  ----     |  ---- |---	   |----- |-------					|
|   id    	 |  int      | 11    | N 	   |      |       			    	|
|  title  	 |varchar    | 60    | N 	   | 普通 | 新闻标题 					|
| content 	 | text      | 65535 | N 	   |  	  | 新闻内容 				|
| img 	  	 |varchar    | 300   |   	   |   	  | 多个图片间用逗号隔开    	|
| tid 	  	 | int       |  11   | N 	   | 普通 | 新闻类型的id 				|
| nstatus 	 |tinyint    | 1     | N 	   |   	  | 状态 1: 展示 0:不展示  	|
| cid 	  	 |  int      | 1 	 | N 	   | 普通 |  关联新闻详情表			|
| created_at | timestamp | 0 	 |   	   |      | 添加时间  				|
| updated_at | timestamp | 0 	 |   	   |      |  修改时间 				|
| deleted_at | timestamp | 0 	 |   	   |      | 删除时间 				|

- 后台新闻列表判断
	- 新闻只能发在三级板块


### news_data 新闻详情表 ###

| 名称 | 类型| 长度 | 是否为空 | 索引 | 注释 | 备注 |
|  ----   |  ---- |  ---- |--------------|--------|-------|-------- |
|   id    |  int  | 11   |      N        |          |        |  a_i    |
| uid | int  |  11  |  N  |  普通  |  发表人id  | |
|  content  |  text  |   | N |    | 新闻内容  | |
|  md | tinyint |    |  N |     |  是否以md格式解|  |
| created_at  | timestamp | 0 |  |  | 添加时间  | |
| updated_at | timestamp | 0 |  |  |  修改时间 |  |
| deleted_at  | timestamp  | 0 |  |  | 删除时间 | |

### discuss 新闻评论表  ###

| 名称 | 类型| 长度 | 是否为空 | 索引 | 注释 | 备注 |
|  ----   |  ---- |  ---- |--------------|--------|-------|-------- |
|  id    |  int  | 11   |      N        |          |        |  a_i    |
| uid  | int  |  11 |  N |  普通  | 评论发表人id |  |
| nid  | int  |  11  | N |  普通  |  新闻id  |    |
| status | tinyint | 1 | N  |   | 状态 1: 展示 0:不展示 | 默认:0|
| content|text |65535 | N |  | 回复内容 |  |
| created_at  | timestamp | 0 |  |  | 添加时间  | |
| updated_at | timestamp | 0 |  |  |  修改时间 | |

### software 软件管理表  ###

| 名称 | 类型| 长度 | 是否为空 | 索引 | 注释 | 备注 |
|  ----   |  ---- |  ---- |--------------|--------|-------|-------- |
|  sid    |  int  | 11   |      N        |          |        |  a_i    |
| uid  | int  |  11 |  N |  普通  | 评论发表人id |  |
| nid  | int  |  11  | N |  普通  |  新闻id  |    |
| status | tinyint | 1 | N  |   | 状态 1: 展示 0:不展示 | 默认:0|
| content|text |65535 | N |  | 回复内容 |  |
| created_at  | timestamp | 0 |  |  | 添加时间  | |
| updated_at | timestamp | 0 |  |  |  修改时间 | |
	CREATE TABLE `software` (
	 `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
	 `stitle` char(255)  COMMENT '软件标题',
	 `src` char(255)  COMMENT '软件路径',
	 `scontent` char(255)  COMMENT '软件介绍',
	 `uid` int(11)  COMMENT '关联上传用户id',
	 `snum` int(11)  COMMENT '下载次数',
	 `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
	 `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
	 PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='软件管理表'

## 全局设置

###  sentive 敏感词表  ###

| 名称 | 类型| 长度 | 是否为空 | 索引 | 注释 | 备注 |
|  ----   |  ---- |  ---- |--------------|--------|-------|-------- |
|   id    |  int  | 11   |      N        |          |        |  a_i    |
| content | varchar | 15  | N  |    |  敏感词  | |


## 社区

### 板块分类表 bbs_sections
|名称|类型|长度|是否为空|索引|注释|备注|
|-|-|-|-|-|-|-|
|id|int|11|N|主键|用户表id| |
|titel|varchar|50|N| |分类名称 | |
| content  | text |  |  N  |  | 评论内容 |   |

### 帖子列表 bbs_article
|名称|类型|长度|是否为空|索引|注释|备注|
|-|-|-|-|-|-|-|
|id|int|11|N|主键|列表页的ID| |
|tid|int|11|N|唯一索引|帖子的ID| |
|typeid|int|11|N| |帖子的分类ID| |
|status|enum| |N| | 帖子的状态|1是正常,2是封禁 |
|title|varchar|11|N| |帖子的标题| |
|nikename|varchar| |N| |用户的昵称| |
|click|int|11|N| |点击量|默认值0|
|reply|int|11|N| |回复数量|默认值0|
|created_at|int|11|N| |添加时间| |
|updated_at|int|11|N| |修改时间| |
|created_at|int|11|N| |删除时间| |
| link |  varchar   |  255  | N |    |  帖子地址   | |

### 帖子详情 bbs_content
|名称|类型|长度|是否为空|索引|注释|备注|
|-|-|-|-|-|-|-|
|id|int|11|N|主键|列表页的ID| |
|uid|int|11|N| |用户的ID| |
|title|varchar|255|N| |帖子的标题| |
|content|MEDIUMTEXT| |N| |帖子内容| |
|md|enum| |N| |是否已MD格式解析|1为md格式,2为html格式 |
|created_at|int|11|N| |添加时间| |
|updated_at|int|11|N| |修改时间| |
|created_at|int|11|N| |删除时间| |

### 帖子回复 bbs_reply
|名称|类型|长度|是否为空|索引|注释|备注|
|-|-|-|-|-|-|-|
|id|int|11|N|主键|回复ID| |
|uid|int|11|N| |回复者ID| |
|content|MEDIUMTEXT| |N| |回复内容| |
| time  | int |  | N |    | 回贴时间 | |
|created_at|int|11|N| |回复时间| |
|updated_at|int|11|N| |修改时间| |
|created_at|int|11|N| |删除时间| |

### 广告 ad
|名称|类型|长度|是否为空|索引|注释|备注|
|-|-|-|-|-|-|-|
|id|int|11|N|主键|列表页的ID| |
|status|enum|11|N| |广告是否开启|1是开启，0是关闭|
|type|enum|11| | |广告的位置|1是首页左侧广告，2是内容页下面的广告,3是内容页右侧广告 |
|content|Text|65535|N| |广告的内容代码| |

### 单页面 single
|名称|类型|长度|是否为空|索引|注释|备注|
|-|-|-|-|-|-|-|
|id|int|11|N|主键|单页的ID| |
|title|varchar|255|N| |单页的标题| |
|link|text|65535|N| |单页面的链接地址| |