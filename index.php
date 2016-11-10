<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="西安交通大学e瞳网是西安交通大学学生综合门户网站，校团委直属社团。旗下拥有十二大核心栏目，为交大师生带来全方位的互联网服务。">
    <meta name="keywords" content="西安交通大学e瞳网,e瞳网,西安交通大学,西安交大,西交新闻">
    <meta name="baidu-site-verification" content="xEZL0gUvwn"/>
    <title>e瞳网</title>
    <!-- 处理了html5标签后可以使ie8也兼容该页面 -->
    <!--[if lte IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- 导航栏开始 -->
    <nav class="e-nav">
        <div class="e-wrapper e-bgw">
            <div class="e-nav-left e-fl">
                <div class="e-nav-bg"></div>
                <i class="e-nav-logo e-fl"></i>
            </div>
            <div class="e-nav-right e-of">
                <h1 class="e-fl"><a class="e-nav-title" href="#"></a></h1>
                <ul class="e-nav-list e-of">
                    <li><a target="_blank" href="http://news.eeyes.net/">小瞳新闻</a></li>
                    <li><a target="_blank" href="http://piao.eeyes.net/">大屏幕</a></li>
                    <li><a target="_blank" href="http://estudy.eeyes.net/">易学堂</a></li>
                    <li><a target="_blank" href="http://2.eeyes.net/">二手市场</a></li>
                    <li><a target="_blank" href="http://qing.eeyes.net/">胭脂坡上</a></li>
                </ul>
            </div>
            <div class="e-cl"></div>
        </div>
    </nav>
    <!-- 导航栏结束 -->
    <!-- 轮播图开始 -->
    <section class="e-slider e-cl"><!-- clear以处理火狐下的bug -->
        <div id="e-slider-content" class="e-wrapper">
            <ul class="pic-list slider">
                <li>
                    <img src="images/lunbo.png" alt=""/>
                </li>
            </ul>
            <div class="e-cl"></div>
        </div>
    </section>
    <!-- 轮播图结束 -->
    <?php
    /**
     * 首页初始化操作
     * 包括配置e瞳新闻数据库配置，大屏幕数据库配置，连接数据库并获取数据
     *
     * @author    李磊 <lilei_mail@foxmail.com>
     * @copyright eeYes.net
     */
    // e瞳新闻数据库配置
    $newsDbInfo = array(
        'hostname' => 'localhost',
        'database' => 'test',
        'username' => 'test',
        'password' => 'test',
        'charset' => 'utf8',
        'table_name' => 'test_news'
    );
    // 大屏幕数据库配置
    $ticDbInfo = array(
        'hostname' => 'localhost',
        'database' => 'test',
        'username' => 'test',
        'password' => 'test',
        'charset' => 'utf8',
        'table_name' => 'test_ticket',
    );
    // 获取新闻信息，从新闻表中取最新的十条新闻的链接，表中有title字段（标题），url字段（链接）
    $newsConn = new PDO(sprintf('mysql:host=%s;dbname=%s;charset=%s', $newsDbInfo['hostname'], $newsDbInfo['database'], $newsDbInfo['charset']), $newsDbInfo['username'], $newsDbInfo['password']);
    $newsResult = $newsConn->query("SELECT `title`, `url` FROM `{$newsDbInfo['table_name']}` ORDER BY `updatetime` DESC LIMIT 10");
    //获取订票信息，包括标题，地点，活动时间
    $ticConn = new PDO(sprintf('mysql:host=%s;dbname=%s;charset=%s', $ticDbInfo['hostname'], $ticDbInfo['database'], $newsDbInfo['charset']), $ticDbInfo['username'], $ticDbInfo['password']);
    $ticResult = $ticConn->query("SELECT `actitle`, `acwhere`, `actime` FROM `{$ticDbInfo['table_name']}` ORDER BY `actime` DESC LIMIT 2");
    ?>
    <!-- 小瞳新闻、大屏幕开始 -->
    <section class="e-news">
        <div class="e-wrapper">
            <div class="e-news-news e-2-1">
                <header>
                    <i class="e-news-icon e-news-icon-news e-fl"></i>
                    <h3 class="e-fl">小瞳新闻</h3>
                    <hr class="e-news-line"/>
                </header>
                <ul class="e-news-list e-cl">
                    <!-- 新闻列表 -->
                    <?php while ($news = $newsResult->fetch(PDO::FETCH_ASSOC)): ?>
                        <li><a href="<?php echo $news['url']; ?>" target="_blank"><?php echo $news['title']; ?></a></li>
                    <?php endwhile; ?>
                    <!-- OVER -->
                </ul>
            </div>
            <div class="e-news-piao e-2-1">
                <header>
                    <i class="e-news-icon e-news-icon-piao e-fl"></i>
                    <h3 class="e-fl">大屏幕</h3>
                    <hr class="e-news-line"/>
                </header>
                <?php while ($tic = $ticResult->fetch(PDO::FETCH_ASSOC)): ?>
                    <figure class="e-piao-wrapper e-cl">
                        <a href="http://ticket.eeyes.net"><img src="images/bird.jpg" alt="<?php echo $tic['actitle']; ?>"></a>
                        <figcaption class="e-piao-info">
                            <h4><a href="http://ticket.eeyes.net"><?php echo $tic['actitle']; ?></a></h4>
                            <p>活动地点：<span><?php echo $tic['acwhere']; ?></span></p>
                            <p>活动时间：<span><?php echo date("Y-M-d", $tic['actime']); ?></span></p>
                            <a href="http://ticket.eeyes.net" class="e-piao-btn">点击抢票</a>
                        </figcaption>
                    </figure>
                <?php endwhile; ?>
            </div>
            <div class="e-cl"></div>
        </div>
    </section>
    <!-- 小瞳新闻、大屏幕结束 -->
    <section class="e-intro e-of"><!-- 采用了足够大的padding处理黑色背景块，需要处理溢出以防止滚动条出现 -->
        <header class="e-intro-title e-tc">
            <hr class="e-big-line e-big-line-top"/>
            <h2>熟悉<span class="e-sh">我们的团队</span>，了解<span class="e-sh">我们的文化</span></h2>
            <hr class="e-big-line"/>
        </header>
        <div class="e-wrapper">
            <div class="e-2-1 e-intro-photo">
                <img src="images/camera.png" alt="e瞳网合照"/>
            </div>
            <div class="e-2-1 e-intro-text">
                <p>西安交通大学e瞳网（www.eeyes.net）是西安交通大学学生综合门户网站，校团委直属社团。旗下拥有十二大核心栏目，为交大师生带来全方位的互联网服务。
                </p>
                <p>e瞳网成立于2002年，在校园社团组织运营上始终保持创新性。 网站在组织形式上走企业化道路，由技术部门，运营部门，信息部门三大部分构成；核心发展理念为“公司制度、家文化、精英社团”——前沿独特的公司架构，温馨有爱的“家文化”氛围，创新高效的精英集体。
                </p>
                <div><p>e瞳网一直专注交大学生最直接的需求，以卓越的技术和独特的视角，为广大学子</p>
                    <div class="e-intro-black">
                        <p class="e-intro-black-inner">提供新闻、视频和学习交流的平台。我们立志于为交大学生发现世界的另一只眼。加入e瞳网，发现更好的自己。</p>
                        <img src="images/biaoyu.png" alt="胜则举杯相庆，败则奋勇相救" class="e-intro-flag"/>
                    </div>
                </div>
            </div>
            <div class="e-cl"></div>
            <div class="e-3-1 e-intro-div">
                <header class="e-intro-div-title e-tc">
                    <h3 class="e-fl">运营部门</h3>
                    <hr class="e-news-line"/>
                </header>
                <article class="e-cl e-tc">
                    <h5>市场部</h5>
                    <p>负责社团的对外沟通、内部的活动组织、网站的线下工作。 </p>
                    <h5>项目部</h5>
                    <p>承担网站重要的运营任务和产品策划工作，在这里每一个人将自己的互联网设想转化为成果，收获对互联网的深层次理解。</p>
                    <h5>公关部</h5>
                    <p>我们负责旗下其他品牌微信公众平台的日常运营，努力打造一个综合性信息平台，做交大看世界的第三只眼。如果你有生花的妙笔，抑或深刻的思想，请不要错过我们
                    </p>
                </article>
            </div>
            <div class="e-3-1 e-intro-div">
                <header class="e-intro-div-title e-tc">
                    <h3 class="e-fl">信息部门</h3>
                    <hr class="e-news-line"/>
                </header>
                <article class="e-cl e-tc">
                    <h5>新闻部</h5>
                    <p>从人物专访中感悟交大的灵魂内涵，在活动新闻里领略交大的缤纷色彩，随调查新闻一同追逐校园里的暗潮涌动。</p>
                    <h5>影视部</h5>
                    <p>翱翔天际，在宇宙中手可摘星辰，影视部的后期制作带你进入梦幻的特效世界。拍下流星划过的壮丽，摄下大地苍茫的雄奇，影视部的专业拍摄展现唯美画面。</p>
                    <h5>新媒体部</h5>
                    <p>再小的自媒体也会有自己的时代，在这里，我们以微信为剑，以互联网为船，乘风破浪。</p>
                </article>
            </div>
            <div class="e-3-1 e-intro-div">
                <header class="e-intro-div-title e-tc">
                    <h3 class="e-fl">技术部门</h3>
                    <hr class="e-news-line"/>
                </header>
                <article class="e-cl e-tc">
                    <h5>前台美工组</h5>
                    <p>这里有程序猿也有PS大师，这里有码农也有3D模型专家。来到这里，写得了页面，做的了设计；学得了技术，练得了素质。 </p>
                    <h5>后台WEB组</h5>
                    <p>我们是网络应用坚实的后盾，php和mysql是我们的武器，linux是我们的阵地，保障网站安全是我们的职责。来这里，让你感受网络世界的风起云涌。</p>
                    <h5>后台APP组</h5>
                    <p>后台App组隶属于e瞳技术部门，目前专攻安卓平台的开发，未来可能引入ios，是e瞳最具发展潜力的部门。</p>
                    <h5>产品部</h5>
                    <p>从无到有，我们全程陪伴。我们是e瞳每一个产品的参与者，制作者。了解最全面的互联网知识，做最受交大学子喜爱的产品是我们对自己的要求。</p>
                    <h5>神秘组织eux</h5>
                    <p>大神齐聚之地，关键词：交互，视觉，体验，创新。</p>
                </article>
            </div>
            <div class="e-cl"></div>
        </div>
    </section>
    <section class="e-join">
        <header class="e-join-title e-tc">
            <hr class="e-big-line e-big-line-top"/>
            <h2><span class="e-sh">加入我们，一起追逐我们的</span>互联网梦想</h2>
            <hr class="e-big-line"/>
        </header>
        <div class="e-wrapper">
            <div class="e-join-left e-2-1">
                <i class="e-join-1 e-fl"></i>
                <p>你可以点击<a class="e-join-link" href="http://join.eeyes.net/">这里</a>，直接进入报名页面；</p>
                <div class="e-cl"></div>
                <i class="e-join-2 e-fl"></i>
                <p>或者，你可以打开手机微信，扫一扫右方的二维码，关注我们的微信公众号，在底部的菜单栏点击加入我们进行报名。</p>
            </div>
            <div class="e-join-right e-2-1">
                <div class="e-join-code e-fl">
                    <img src="images/weixin.png" alt="微信二维码">
                </div>
                <div class="e-join-logo e-fl"></div>
            </div>
            <div class="e-cl"></div>
        </div>
    </section>
    <section class="e-footer e-tc">
        <div class="e-wrapper">
            <div class="e-footer-logo"></div>
            <ul class="e-footer-list">
                <li><a target="_blank" href="http://www.xjtu.edu.cn/">西安交通大学</a></li>
                <li><a target="_blank" href="http://www.lib.xjtu.edu.cn/">校图书馆</a></li>
                <li><a target="_blank" href="http://www.xjturoboteam.com/">西安交通大学机器人队</a></li>
                <li><a target="_blank" href="http://news.eeyes.net/">小瞳新闻</a></li>
                <li><a target="_blank" href="http://estudy.eeyes.net/">易学堂</a></li>
                <li><a target="_blank" href="http://ticket.eeyes.net/">大屏幕</a></li>
                <li><a target="_blank" href="http://idv.eeyes.net">爱影视</a></li>
                <li><a target="_blank" href="http://zhidao.eeyes.net/">交大知道</a></li>
                <li><a target="_blank" href="http://2.eeyes.net/">二手市场</a></li>
                <li><a target="_blank" href="http://qing.eeyes.net/">胭脂坡上</a></li>
            </ul>
            <p class="e-copyright">eeYes.net &copy;2002-2015 版权所有</p>
            <p class="e-icp">陕ICP备030061号</p>
            <div class="e-cl"></div>
        </div>
    </section>
    <script type="text/javascript">
        console && console.info && console.info("         __   __                     _   \n  ___  __\\ \\ / /__  ___   _ __   ___| |_ \n / _ \\/ _ \\ V / _ \\/ __| | '_ \\ / _ \\ __|\n|  __/  __/| |  __/\\__ \\_| | | |  __/ |_ \n \\___|\\___||_|\\___||___(_)_| |_|\\___|\\__|\n想加入e瞳网？请发送邮件到 lilei_mail@foxmail.com");
    </script>
    <div style="display:none">
        <script src="//s11.cnzz.com/z_stat.php?id=1256846918" type="text/javascript"></script>
        <a class="threesixzero" href="http://webscan.360.cn/index/checkwebsite/url/eeyes.net"><img border="0" src="http://img.webscan.360.cn/status/pai/hash/24834e201aeca4964d639c7783478a7c"/></a>
    </div>
</body>
</html>
