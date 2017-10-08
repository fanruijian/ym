            <!-- end #header -->
                <div class="clearfix">
                    <div class="content_l">
                        <form id="companyListForm" name="companyListForm" method="get" action="/index.php/Home/Index/search.html">
                            <input type="hidden" id="city" name="city" value="全国" />
                            <input type="hidden" id="fs" name="fs" value="" />
                            <input type="hidden" id="ifs" name="ifs" value="" />
                            <input type="hidden" id="ol" name="ol" value="" />
                            <dl class="hc_tag">
                                <dd>
                                    <dl>
                                        <dt>类型</dt>
                                        <dd>
                                            <?php foreach ($category as $key => $value) { ?>
                                            <a href="javascript:void(0)"><?php echo $value['title'];?></a>
                                            <?php } ?>
                                        </dd>
                                    </dl>
                                </dd>
                            </dl>
                            <dl class="hc_tag">
                                <dd>
                                    <dl>
                                        <dt>语言</dt>
                                        <dd>
                                            <?php foreach ($category as $key => $value) { ?>
                                            <a href="javascript:void(0)"><?php echo $value['title'];?></a>
                                            <?php } ?>
                                        </dd>
                                    </dl>
                                </dd>
                            </dl>
                            <ul class="hc_list reset">
                                <?php foreach ($yms as $key2 => $value2) { ?>
                                <li>
                                    <a href="/index.php/Home/Index/showCompany/id/1.html" target="_blank">
                                        <h3 title="测试">
                                            <?php echo $value2['title']?>                                        </h3>
                                        <div class="comLogo">
                                                                                        <img src="<?php echo $value2['pic_url']?>" width="190" height="190" alt="布袋谷" />                                            <ul>
                                                <li>
                                                    类型：<?php echo $value2['cat_id']?>                                                </li>
                                            </ul>
                                        </div>
                                    </a>
                                    <a href="/index.php/Home/JobShow/index/jid/4.html" target="_blank">
                                        简介：<?php echo $value2['discription']?>                                    </a>                                    <ul class="reset ctags">
                                        <li><?php echo $value2['created_at']; ?></li><li>下载:<?php echo $value2['shows']; ?></li>                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>
                            <div class="Pagination"><?php echo $page; ?></div>
                        </form>
                    </div>
                    <div class="content_r">
                        <div class="subscribe_side">
                            <a href="subscribe.html" target="_blank">
                                <div class="subpos">
                                    <span>
                                        订阅
                                    </span>
                                    职位
                                </div>
                                <div class="c7">
                                    招聘网会根据你的筛选条件，定期将符合你要求的职位信息发给你
                                </div>
                                <div class="count">
                                    已有
                                    <em>3</em>
                                    <em>4</em>
                                    <em>2</em>
                                    <em>1</em>
                                    <em>0</em>
                                    人订阅
                                </div>
                                <i>我也要订阅职位</i>
                            </a>
                        </div>
                        <div class="greybg qrcode mt20">
                            <img src="../Public/HomeStyle/images/companylist_qr.png" width="242" height="242" alt="招聘微信公众号二维码"
                            />
                            <span class="c7">
                                扫描招聘二维码，微信轻松搜工作
                            </span>
                        </div>
                        <!-- <a href="h/speed/speed3.html" target="_blank" class="adSpeed"></a> -->
                        <a href="h/subject/jobguide.html" target="_blank" class="eventAd">
                            <img src="../Public/HomeStyle/images/subject280.jpg" width="280" height="135" />
                        </a>
                        <a href="h/subject/risingPrice.html" target="_blank" class="eventAd">
                            <img src="../Public/HomeStyle/images/rising280.png" width="280" height="135" />
                        </a>
                    </div>
                </div>
                <input type="hidden" value="" name="userid" id="userid" />
                <div class="clear"></div>
                <input type="hidden" id="resubmitToken" value="" />
                <a id="backtop" title="回到顶部" rel="nofollow"></a>
            <!-- end #container -->
            <!-- 定义数据块 -->
        <?php $this->beginBlock('test'); ?>
            jQuery(function($) {

                    $('.hc_list li:nth-child(1)').css('clear', 'both');
                    $('.hc_list li:nth-child(4)').css('clear', 'both');
                    $('.hc_list li:nth-child(7)').css('clear', 'both');
                    $('.hc_list li:nth-child(10)').css('clear', 'both');
                    $('.hc_list li:nth-child(13)').css('clear', 'both');
            })
        <?php $this->endBlock() ?>
        <!-- 将数据块 注入到视图中的某个位置 -->
        <?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
        </div>
        <!-- end #body -->
        <?php \frontend\assets\AppAsset::register($this);?>
    </body>

</html>