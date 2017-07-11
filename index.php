<?php
include 'config.php';
include 'function.php';
$date = date('Ymd');
$old_date = $date-1;
$top_list = json_decode(curl('http://reader.res.meizu.com/reader/index/index.json'),true);
$old_news_list = json_decode(curl('http://reader.res.meizu.com/reader/importantnew/'.$old_date.'/importantnew.json'),true);
$news_list = json_decode(curl('http://reader.res.meizu.com/reader/importantnew/'.$date.'/importantnew.json'),true);
if(empty($news_list)){$news_list = $old_news_list;$date = $old_date;}
$top_list_1 = array('title'=>$top_list['topList']['1']['title'],'desc'=>$top_list['topList']['1']['description'],'id'=>$top_list['topList']['1']['articleId'],'pic'=>$top_list['topList']['1']['imgUrlList']['0'],'from'=>$top_list['topList']['1']['contentSourceName']);
$top_list_2 = array('title'=>$top_list['topList']['2']['title'],'desc'=>$top_list['topList']['2']['description'],'id'=>$top_list['topList']['2']['articleId'],'pic'=>$top_list['topList']['2']['imgUrlList']['0'],'from'=>$top_list['topList']['2']['contentSourceName']);
$top_list_3 = array('title'=>$top_list['topList']['3']['title'],'desc'=>$top_list['topList']['3']['description'],'id'=>$top_list['topList']['3']['articleId'],'pic'=>$top_list['topList']['3']['imgUrlList']['0'],'from'=>$top_list['topList']['3']['contentSourceName']);
$top_list_4 = array('title'=>$top_list['topList']['4']['title'],'desc'=>$top_list['topList']['4']['description'],'id'=>$top_list['topList']['4']['articleId'],'pic'=>$top_list['topList']['4']['imgUrlList']['0'],'from'=>$top_list['topList']['4']['contentSourceName']);
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=DESCRIPTION?>">
    <meta name="keywords" content="<?=KEYWORDS?>">
    <title><?=TITLE?></title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    <script src="public/js/holder.min.js"></script>
    <script src="public/js/ie10-viewport-bug-workaround.js"></script>
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="<?=$top_list_1['pic']?>" alt="<?=$top_list_1['desc']?>">
          <div class="container">
            <div class="carousel-caption">
              <h1><?=$top_list_1['title']?></h1>
              <p><?=$top_list_1['desc']?>(From:<?=$top_list_1['from']?>)</p>
              <p><a class="btn btn-lg btn-primary" href="view.html?date=<?=$date?>&id=<?=$top_list_1['id']?>" role="button">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="<?=$top_list_2['pic']?>" alt="<?=$top_list_2['desc']?>">
          <div class="container">
            <div class="carousel-caption">
              <h1><?=$top_list_2['title']?></h1>
              <p><?=$top_list_2['desc']?>(From:<?=$top_list_2['from']?>)</p>
              <p><a class="btn btn-lg btn-primary" href="view.html?date=<?=$date?>&id=<?=$top_list_2['id']?>" role="button">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="<?=$top_list_3['pic']?>" alt="<?=$top_list_2['desc']?>">
          <div class="container">
            <div class="carousel-caption">
              <h1><?=$top_list_3['title']?></h1>
              <p><?=$top_list_3['desc']?>(From:<?=$top_list_3['from']?>)</p>
              <p><a class="btn btn-lg btn-primary" href="view.html?date=<?=$date?>&id=<?=$top_list_3['id']?>" role="button">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="four-slide" src="<?=$top_list_4['pic']?>" alt="<?=$top_list_4['desc']?>">
          <div class="container">
            <div class="carousel-caption">
              <h1><?=$top_list_4['title']?></h1>
              <p><?=$top_list_4['desc']?>(From:<?=$top_list_4['from']?>)</p>
              <p><a class="btn btn-lg btn-primary" href="view.html?date=<?=$date?>&id=<?=$top_list_4['id']?>" role="button">Read More</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="container marketing">
        <div class="main_list">
            <ul>
            <?php
            foreach ($news_list as $news) {
echo<<<html
                    <li>
                        <a href="view.html?date=$date&id={$news['articleId']}" target="_blank"><img src="{$news['imgUrlList']['0']}"></a>
                        <a class="copyright">{$news['contentSourceName']}</a>
                        <a class="title" href="view.html?date=$date&id={$news['articleId']}" target="_blank">{$news['title']}</a>
                        <div class="description">{$news['description']}</div>
                    </li>
html;
            }
            ?>
            </ul>
        </div>
    </div>
    <script src="//cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>