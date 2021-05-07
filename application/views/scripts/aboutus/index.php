<?php echo $this->render("header.php"); ?>
<div class="swiper-container">
  <div class="swiper-wrapper">
  <div class="swiper-slide" id="top">
        <?php echo $this->render("nav.php"); ?>
        <ul id="mySlide">
            <?php
                foreach ($this->bannerlist as $bval) {
                    if ($bval['path'] === 'aboutus') {
                        echo "<li><a><img class='responsive' src='{$this->mimgUrl}{$bval['name']}'></a></li>";
                    }
                }
            ?>
        </ul>
        <img src="<?php echo $this->mimgUrl ?>banner_text.png" class="banner_text">
    </div>
  <img src="<?php echo $this->mimgUrl ?>banner_2.jpg" id="dean" class="responsive swiper-slide">
  <div class="swiper-slide" id="service">
        <?php
            foreach ($this->service as $index => $val) {
                $i = $index + 1;
                echo "<a href='{$val['url']}' class='bgbox' style='background-image:url({$this->mimgUrl}bg{$i}.jpg)'>
                        <div class='content'>
                        <h2>{$val['title']}</h2>
                        <p>{$val['content']}</p>
                        </div>
                    </a>";
            }
        ?>
        <div class="textBox">
            <img src="<?php echo $this->mimgUrl ?>title2.png" class="responsive title">
            <p>
                梦想商学院精心打造职业发展、创新训练、创业孵化三大服务模块，为个人成才和事业成就提供持续的引领、赋能和陪伴。
            </p>
        </div>
    </div>
    <div class="swiper-slide" id="teacher">
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
            <img src="' . $val['thumb'] . '" class="responsive">
            <h4><img src="' . $val['name'] . '" alt=""></h4>
            <p>' . $val['des'] . '</p>
            <a href="' . $href . '" class="more">
                <img src="' . $this->imgUrl . 'more.png">
            </a>
            </div>';
        }
        ?>
    </div>
    <div class="swiper-slide" id="student">
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
    <div class="swiper-slide" id="news">
        <div class="textBox">
            <img src="<?php echo $this->mimgUrl ?>title5.png" class="responsive title">
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
</div>

<script>
    var page = <?php echo json_encode($this->count) ?>,
        teachers = <?php echo json_encode($this->teachers) ?>;
</script>
<?php echo $this->render("footer.php"); ?>