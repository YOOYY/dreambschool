<div id="footer">
    <div class="container">
        <div class="cover">
            <dl>
                <dt>关于我们</dt>
                <dd><a href="<?php echo $this->baseUrl; ?>#introduction">公司介绍</a></dd>
                <dd><a href="<?php echo $this->baseUrl; ?>#history">公司大事记</a></dd>
                <dd><a href="<?php echo $this->baseUrl; ?>#map">公司地图</a></dd>
                <dd><a href="<?php echo $this->baseUrl; ?>#joinus">招聘信息</a></dd>
            </dl>
            <dl>
                <dt>业务板块</dt>
                <dd><a href="<?php echo $this->baseUrl; ?>service#develop">职业发展</a></dd>
                <dd><a href="<?php echo $this->baseUrl; ?>service#training">创新训练</a></dd>
                <dd><a href="<?php echo $this->baseUrl; ?>service#incubation">创业孵化</a></dd>
            </dl>
            <dl>
                <dt>用户须知</dt>
                <dd><a href="<?php echo $this->baseUrl; ?>news/legal">法律声明</a></dd>
                <dd><a href="<?php echo $this->baseUrl; ?>news/service">服务条款</a></dd>
                <dd><a href="<?php echo $this->baseUrl; ?>news/privacy">隐私声明</a></dd>
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
        </div>
        <p class="tips">
            <a href="http://www.beian.miit.gov.cn" target="_blank">网站备案/许可证号:沪ICP备18024039号-1</a>
            <a class="beian" href="" target="_blank">
                <img src="<?php echo $this->imgUrl ?>beian.png">&nbsp沪公网安备
            </a>
        </p>
    </div>
</div>
<script src="<?php echo $this->baseUrl; ?>js/jquery.js"></script>
<script src="<?php echo $this->baseUrl; ?>js/base.js"></script>
<?php
if ($this->footer) {
    echo $this->footer;
}
?>
</body>

</html>