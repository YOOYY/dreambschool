<?php echo $this->render("header.php"); ?>
<div id="top" style="background: url(../imgs/service/<?php echo $this->imglist[0];?>) no-repeat top center/contain;">
    <?php echo $this->render("nav.php"); ?>
</div>
<div id="service" class="container">
    <h1 class='img_title'><img src="<?php echo $this->mimgUrl ?>title.png" alt="业务板块"></h1>
    <?php
    foreach ($this->service as $index => $val) {
        $i = $index + 1;
        echo "<h2 id={$val['uid']}>{$val['title']}</h2>
        <p>{$val['content']}</p>
        <img src='{$this->mimgUrl}{$this->imglist[$i]}' class='responsive'>";
    }
    ?>
</div>
<?php echo $this->render("footer.php"); ?>