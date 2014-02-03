<?php if(!defined("ROOT_PATH"))exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>welcome</title>
    <style type="text/css">
        * {
            padding: 0px;
            margin: 0px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: #4e8700;
        }

        ul, ol {
            list-style: none;
        }

        div.big {
            padding: 20px;
        }

        div.title {
            margin-bottom: 10px;
        }

        div.title h2 {
            font-size: 14px;
            color: #333;
        }

        ul li {
            font-size: 12px;
            width: 45%;
            background: #f3f3f3;
            border: solid 1px #dadada;
            float: left;
            margin-right: 15px;
            margin-bottom: 10px;
        }

        ul li dl dt {
            background: #f0f0f0;
            border-bottom: solid 1px #4e8700;
            padding:5px 10px;
        }

        ul li dl dd {
            padding: 5px 10px;
        }

        ul li dl dd a {
            color: #666;
            display: block;
        }
    </style>
</head>
<body>
<div class="big">
    <div class="title">
        <h2>HDCMS稳定高效,100%免费</h2>
    </div>
    <ul>
        <li>
            <dl>
                <dt>HDCMS最新消息</dt>
                <dd>
                    <a href="#">HDCMS系统正式发布！</a>
                </dd>
            </dl>
        </li>
        <li>
            <dl>
                <dt>最新文章</dt>
                <list from="$article" name="n">
                    <dd>
                        <span style="float:right;display:block;color:#999;">({$n.updatetime|date:"Y-m-d",@@})</span>
                        <a href="{|getArticleUrl:$n}" target="_blank">{$n.title}</a>
                    </dd>
                </list>
            </dl>
        </li>
        <li style="width:91.5%">
            <dl>
                <dt>免费模板</dt>
                <!--
                <list from="$article" name="n">
                    <dd style="float:left;">
                        <a href="#">
                            <img src="http://localhost/hdcms/data/img/tpl_thumb.png" width="120" height="120"/>
                        </a>
                    </dd>
                </list>
                -->
            </dl>
        </li>
    </ul>
</div>
</body>
</html>