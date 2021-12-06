<div id="header" <?php echo $this->controllername == 'news' ? 'class="new_header"' : ''; ?>>
    <div class="container">
        <a class="fl logo" href="<?php echo $this->baseUrl; ?>">
            <img class="responsive" src="<?php echo $this->imgUrl; ?>logo<?php echo $this->controllername == 'news' ? '2' : ''; ?>.png">
        </a>
        <ul class="nav">
            <li <?php echo $this->controllername == 'index' ? 'class="active"' : ''; ?>>
                <a href="<?php echo $this->baseUrl; ?>?id=1">院长寄语</a>
            </li>
            <li <?php echo $this->controllername == 'aboutus' ? 'class="active"' : ''; ?>>
                <div>
                    <a href="<?php echo $this->baseUrl; ?>aboutus" class="ico">关于我们</a>
                    <ul class="subnav">
                        <li><a href="<?php echo $this->baseUrl; ?>aboutus#introduction">公司介绍</a></li>
                        <li><a href="<?php echo $this->baseUrl; ?>aboutus#history">公司大事记</a></li>
                        <li><a href="<?php echo $this->baseUrl; ?>aboutus#map">公司地图</a></li>
                        <li><a href="<?php echo $this->baseUrl; ?>aboutus#joinus">招聘信息</a></li>
                    </ul>
                </div>
            </li>
            <li <?php echo $this->controllername == 'service' ? 'class="active"' : ''; ?>>
                <div>
                    <a href="<?php echo $this->baseUrl; ?>service" class="ico">业务板块</a>
                    <ul class="subnav">
                        <li><a href="<?php echo $this->baseUrl; ?>service#develop">职业发展</a></li>
                        <li><a href="<?php echo $this->baseUrl; ?>service#training">创新训练</a></li>
                        <li><a href="<?php echo $this->baseUrl; ?>service#incubation">创业孵化</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="<?php echo $this->baseUrl; ?>?id=3">梦想导师</a>
            </li>
            <li>
                <a href="<?php echo $this->baseUrl; ?>?id=4">学子风采</a>
            </li>
            <li>
                <a href="<?php echo $this->baseUrl; ?>?id=5">公司动态</a>
            </li>
        </ul>
        <div class="phone-nav"><img src="<?php echo $this->imgUrl ?>phone_nav.png" alt="">
            <ul class="subnav">
                <li>
                    <div class="p_t">
                        <div>关于我们</div>
                        <ul class="p_subnav">
                            <li><a href="<?php echo $this->baseUrl; ?>aboutus#introduction">公司介绍</a></li>
                            <li><a href="<?php echo $this->baseUrl; ?>aboutus#history">公司大事记</a></li>
                            <li><a href="<?php echo $this->baseUrl; ?>aboutus#map">公司地图</a></li>
                            <li><a href="<?php echo $this->baseUrl; ?>aboutus#joinus">招聘信息</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="<?php echo $this->baseUrl; ?>#dean">院长寄语</a></li>
                <li>
                    <div class="p_t">
                        <div>业务板块</div>
                        <ul class="p_subnav">
                            <li><a href="<?php echo $this->baseUrl; ?>service#develop">职业发展</a></li>
                            <li><a href="<?php echo $this->baseUrl; ?>service#training">创新训练</a></li>
                            <li><a href="<?php echo $this->baseUrl; ?>service#incubation">创业孵化</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="<?php echo $this->baseUrl; ?>#teacher">梦想导师</a></li>
                <li><a href="<?php echo $this->baseUrl; ?>#student">学子风采</a></li>
                <li><a href="<?php echo $this->baseUrl; ?>#news">公司动态</a></li>
            </ul>
        </div>
    </div>
</div>