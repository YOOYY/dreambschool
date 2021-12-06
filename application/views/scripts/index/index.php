<?php echo $this->render("header.php"); ?>
<div class="swiper-container">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
        <div id="top">
            <?php echo $this->render("nav.php"); ?>
            <div id="mySlide">
                <div class="swiper-wrapper">
                    <?php
                        foreach ($this->bannerlist as $bval) {
                            if ($bval['path'] === 'index') {
                                echo "<div class='swiper-slide'><img class='responsive' src='{$this->mimgUrl}{$bval['name']}'></div>";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="navigatorBox">
                <img src="/imgs/index/banner_text.png" class="banner_text">
                <div class="navigatorbar">
                    <div class="navigator prev"><img src="/imgs/edslider-prev.png"></div>
                    <div class="navigator next"><img src="/imgs/edslider-next.png"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-slide">
        <img src="<?php echo $this->mimgUrl.$this->imglist[4]; ?>" id="dean" class="responsive">
    </div>
    <div class="swiper-slide">
        <div id="service">
            <?php
                foreach ($this->service as $index => $val) {
                    $i = $index + 6;
                    echo "<a href='{$val['url']}' class='bgbox' style='background-image:url({$this->mimgUrl}{$this->imglist[$i]})'>
                            <div class='content'>
                            <h2>{$val['title']}</h2>
                            <p>{$val['content']}</p>
                            </div>
                        </a>";
                    $i++;
                }
            ?>
            <div class="textBox">
                <img src="<?php echo $this->mimgUrl ?>title2.png" class="responsive title">
                <p>
                    梦想商学院精心打造职业发展、创新训练、创业孵化三大服务模块，为个人成才和事业成就提供持续的引领、赋能和陪伴。
                </p>
            </div>
        </div>
    </div>
    <div class="swiper-slide">
        <div id="teacher">
            <div class="textBox">
                <img src="<?php echo $this->mimgUrl ?>title3.png" class="responsive title">
                <div class="bar">
                    <img src="<?php echo $this->mimgUrl ?>prev.png" class="prev">
                    <img src="<?php echo $this->mimgUrl ?>1.png" class="curpage">
                    <img src="<?php echo $this->mimgUrl ?>s.png" alt="">
                    <img src="<?php echo $this->mimgUrl;
                                echo $this->count; ?>.png" alt="">
                    <img src="<?php echo $this->mimgUrl ?>next.png" class="next">
                </div>
            </div>
            <?php
            $a = $this->num % 3;
            foreach ($this->teachers as $index => $val) {
                $href = $this->baseUrl;
                if ($a > 0 && $index >= ($this->num - $a)) {
                    $w = ' w' . $a;
                } else {
                    $w = '';
                }
                echo '<div class="teacherBox col' . ($index % 3 + 1) . ' row' . (floor($index / 3) + 1) . $w . '">
                <div class="hackimg" style="background-image:url(' . $val['thumb'] . ')"></div>
                <h4><img src="' . $val['name'] . '" alt=""></h4>
                <p>' . $val['des'] . '</p>
                <a href="' . $href . '" class="more">
                    <img src="' . $this->imgUrl . 'more.png">
                </a>
                </div>';
            }
            ?>
        </div>
    </div>
    <div class="swiper-slide" style="background-color: #1c1c24;">
        <div id="student">
            <?php
                foreach ($this->students as $index => $val) {
                    if ($index < 4) {
                        echo "<a href='' class='bgbox' style='background-image:url({$val['thumb']})'>
                            <div class='content'>
                            <h2>{$val['des']}</h2>
                            {$val['content']}
                            </div>
                        </a>";
                    }
                }
            ?>
            <div class="textBox">
                <img src="<?php echo $this->mimgUrl ?>title4.png" class="responsive title">
            </div>
        </div>
    </div>

    <div class="swiper-slide">
        <div id="news">
            <div class="textBox">
                <img src="<?php echo $this->mimgUrl ?>title5.png" class="responsive title">
            </div>
            <div class="p_title">
                <img src="<?php echo $this->mimgUrl ?>p_title.png">
            </div>
            <div class="newlist">
                <?php
                $l = '';
                $r = '';
                foreach ($this->article as $index => $val) {
                    $date = explode(' ', $val['time'])[0];
                    $dateArr = explode('-', $date);
                    $day = array_pop($dateArr);
                    $date = implode('.', $dateArr);
                    $href = $this->baseUrl;
                    if ($index < 2) {
                        $l .= '<a href="' . $href . '">
                        <img class="responsive" src="' . $val['thumb'] . '">
                        <div class="text">
                            <div class="time">
                                <div class="day">' . $day . '</div>
                                <div class="year">' . $date . '</div>
                            </div>
                            <div class="list">
                                <h2 class="title">' . $val['title'] . '</h2>
                                <div class="des">' . $val['des'] . '</div>
                                <div class="more"><i class="icon"></i>查看详情</div>
                            </div>
                        </div>
                        </a>';
                    } else if ($index < 5) {
                        $r .= '<a>
                    <div class="time">
                        <div class="day">' . $day . '</div>
                        <div class="line"></div>
                        <div class="year">' . $date . '</div>
                    </div>
                    <div class="list">
                        <h2 class="title">' . $val['title'] . '</h2>
                        <div class="des">' . $val['des'] . '</div>
                        <i class="more"><img src="' . $this->imgUrl . 'more2.png" alt=""></i>
                    </div>
                </a>';
                    }
                }
                ?>
                <div class="boxleft">
                    <?php echo $l; ?>
                </div>
                <div class="boxright">
                    <?php echo $r; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="swiper-slide">
        <div id="footer">
            <div class="container">
                <div class="cover">
                    <dl>
                        <dt>关于我们</dt>
                        <dd><a href="<?php echo $this->baseUrl; ?>aboutus#introduction">公司介绍</a></dd>
                        <dd><a href="<?php echo $this->baseUrl; ?>aboutus#history">公司大事记</a></dd>
                        <dd><a href="<?php echo $this->baseUrl; ?>aboutus#map">公司地图</a></dd>
                        <dd><a href="<?php echo $this->baseUrl; ?>aboutus#joinus">招聘信息</a></dd>
                    </dl>
                    <dl>
                        <dt>业务板块</dt>
                        <dd><a href="<?php echo $this->baseUrl; ?>service#develop">职业发展</a></dd>
                        <dd><a href="<?php echo $this->baseUrl; ?>service#training">创新训练</a></dd>
                        <dd><a href="<?php echo $this->baseUrl; ?>service#incubation">创业孵化</a></dd>
                        <dd style="text-indent:-999px;overflow:hidden">创</dd>
                    </dl>
                    <dl>
                        <dt>用户须知</dt>
                        <dd><a href="<?php echo $this->baseUrl; ?>news/legal">法律声明</a></dd>
                        <dd><a href="<?php echo $this->baseUrl; ?>news/service">服务条款</a></dd>
                        <dd><a href="<?php echo $this->baseUrl; ?>news/privacy">隐私声明</a></dd>
                        <dd style="text-indent:-999px;overflow:hidden">创</dd>
                    </dl>
                    <dl>
                        <dt>Link</dt>
                        <dd><a href="<?php echo $this->baseUrl; ?>">光华教育集团</a></dd>
                        <dd><a href="<?php echo $this->baseUrl; ?>">光华剑桥</a></dd>
                        <dd><a href="<?php echo $this->baseUrl; ?>">光华启迪</a></dd>
                        <dd><a href="<?php echo $this->baseUrl; ?>">学之行</a></dd>
                    </dl>
                    <dl class="phone">
                        <dt>联系我们</dt>
                        <dd>021-65882888</dd>
                        <dd>mxsxy@wedream.com</dd>
                    </dl>
                    <div class="erweibox">
                        <img src="<?php echo $this->imgUrl; ?>code.jpg" alt="">
                        <p>官方微信公众号</p>
                    </div>
                </div>
                <p class="tips">
                    <a href="http://www.beian.miit.gov.cn" target="_blank">网站备案/许可证号:沪ICP备18024039号-1</a>
                    <a class="beian" href="" target="_blank">
                        <img src="<?php echo $this->imgUrl ?>beian.png">&nbsp沪公网安备
                    </a>
                </p>
            </div>
        </div>
    </div>

  </div>
</div>
<script>
    var page = <?php echo json_encode($this->count) ?>,
        teachers = <?php echo json_encode($this->teachers) ?>;
</script>
<script src="<?php echo $this->baseUrl; ?>js/jquery.js"></script>
<script src="<?php echo $this->baseUrl; ?>js/base.js"></script>
<script>
var imglist_on = [
    '<?php echo "{$this->mimgUrl}{$this->imglist[5]}" ?>',
    '<?php echo "{$this->mimgUrl}{$this->imglist[7]}" ?>',
    '<?php echo "{$this->mimgUrl}{$this->imglist[9]}" ?>'
],imglist = [
    '<?php echo "{$this->mimgUrl}{$this->imglist[6]}" ?>',
    '<?php echo "{$this->mimgUrl}{$this->imglist[8]}" ?>',
    '<?php echo "{$this->mimgUrl}{$this->imglist[10]}" ?>'
]
</script>
<?php
if ($this->footer) {
    echo $this->footer;
}
?>
</body>

</html>