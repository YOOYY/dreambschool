<?php echo $this->render("header.php"); ?>
<div id="top" style="background: url(../imgs/service/<?php echo $this->imglist[0];?>) no-repeat top center/contain;">
<?php echo $this->render("nav.php"); ?>
</div>
<div id="index">
    <div id="introduction" class="container">
        <h1 class="img_title"><img src="<?php echo $this->mimgUrl ?>title1.png" alt=""></h1>
        <p class="intro">
        <?php echo $this->index ?>
        </p>
        <table class="iconbox">
            <tbody>
                <tr>
                    <td>
                        <img src="/imgs/aboutus/icon1.png" alt="">
                        <h2>使命</h2>
                        <p>赋能职业成长，成就事业梦想</p>
                    </td>
                    <td>
                        <img src="/imgs/aboutus/icon2.png" alt="">
                        <h2>愿景</h2>
                        <p class="p_con">打造中国一流、世界领先的<br>高端人才成长与创新教育服务的综合旗舰</p>
                    </td>
                    <td class="last">
                        <img src="/imgs/aboutus/icon3.png" alt="">
                        <h2>价值观</h2>
                        <p>以人为本，创新引领，追求卓越</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="history">
        <h1 class="img_title history_title"><img src="<?php echo $this->mimgUrl ?>title2.png" alt=""></h1>
        <div class="historyline">
            <img src="<?php echo $this->mimgUrl.$this->imglist[3]; ?>" class="responsive">
        </div>
    </div>

    <div id="map">
        <h1 class="img_title"><img src="<?php echo $this->mimgUrl ?>title3.png" alt=""></h1>
        <div class="imgbox">
            <div>
                <img src="<?php echo $this->mimgUrl.$this->imglist[1]; ?>" alt="">
            </div>
            <div>
                <img src="<?php echo $this->mimgUrl.$this->imglist[2]; ?>" alt="">
            </div>
        </div>
    </div>

    <div id="joinus" class="container">
        <h1 class="img_title"><img src="<?php echo $this->mimgUrl ?>title4.png" alt=""></h1>
        <div class="chapter">
            <?php
            $contents = array();
            foreach ($this->list as $index => $val) {
                $middle = ($index-1)%3 === 0 ? 'class="middle"':'';
                array_push($contents,$val['content']);
                echo '<div '.$middle.'>
                    <p class="title">招聘岗位名称</p>
                    <p class="content">'.$val['name'].'</p>
                    <p class="title">招聘人数</p>
                    <p class="content">'.$val['num'].'人</p>
                    <img src="' . $this->imgUrl . 'more3.png" class="more">
                </div>';
            }
            ?>
        </div>

    </div>
</div>
<div class="mask">
    <div class="cover">
        <div class="content">
            <div class="chapter">
                <h3>岗位名称</h3>
                <p>新媒体写手</p>
                <h3>招聘人数</h3>
                <p>2人</p>
                <h3>岗位职责</h3>
                <p>1. 负责公司旗下各新媒体渠道（包括微信、知乎、微博、小红书、头条等）内容运营工作，包括撰写、排版推送、粉丝互动等</p>
                <p>1. 负责公司旗下各新媒体渠道（包括微信、知乎、微博、小红书、头条等）内容运营工作，包括撰写、排版推送、粉丝互动等</p>
                <p>1. 负责公司旗下各新媒体渠道（包括微信、知乎、微博、小红书、头条等）内容运营工作，包括撰写、排版推送、粉丝互动等</p>
                <h3>岗位要求</h3>
                <p>1. 本科以上学历，2年以上微信公众平台运营经验，30岁以下</p>
                <p>1. 本科以上学历，2年以上微信公众平台运营经验，30岁以下</p>
                <p>1. 本科以上学历，2年以上微信公众平台运营经验，30岁以下</p>
            </div>
        </div>
        <img class="close" src="<?php echo $this->imgUrl ?>close.png">
    </div>
</div>
<script>
    var contents = <?php echo json_encode($contents)?>;
</script>
<?php echo $this->render("footer.php"); ?>