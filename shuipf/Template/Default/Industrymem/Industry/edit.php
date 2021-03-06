<extend name="./lvyecms/Template/Default/Content/common/_layout.php"/>
<block name='after_styles'>
    <link href="{$Config_siteurl}statics/js/uploadify/uploadify.css">
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <style type="text/css">
    	#prompt{display: none;}
    	#prompt .prompt_div{background: #000000; opacity: 0.2; width: 100%;height: 100%;position: fixed;left: 0;top:0; z-index: 100;}
    	#prompt .prompt_alert{width: 604px;height: 375px;background: #fff;position: fixed;top: 50%;left: 50%;margin-top: -188px;margin-left: -302px;z-index: 200;border-radius: 5px;box-shadow:1px 1px 0px;}
    	#prompt .prompt_alert .prompt_pic{margin: 59px auto 19px;width: 69px;height: 69px;background: url('../statics/images/finance_success_03.png') no-repeat;}
    	#prompt .prompt_alert .prompt_content{text-align: center;}
    	#prompt .prompt_alert .prompt_content h3{font-size: 24px;color: #5C708F;line-height: 30px;}
    	#prompt .prompt_alert .prompt_content p{font-size: 20px;line-height: 40px;color: #ABB8C6;}
    	#prompt .prompt_alert .prompt_btn{margin-top: 45px;margin-left: 130px;}
    	#prompt .prompt_alert .prompt_btn button{width: 170px;height: 50px;border-radius: 5px;border: 1px solid #A1B2C4;font-size: 19px;}
    	#prompt .prompt_alert .prompt_btn button.yes{background: #2D8DDC;color: #fff;}
    </style>
</block>
<block name='content'>
	<div id="banner">
    <img src="{$Config_siteurl}statics/images/banner.png">
</div>
<div id="search">
    <div class="container clearfix">
        <p class="tips">欢迎关注山西文化产业微信公众号：2356982455</p>
        <form action="">
            <input type="text" placeholder="输入你要搜索的关键字" />
            <input type="submit" value="搜索" />
        </form>
    </div>
</div>
<div id="nav">
    <div class="container">
        <ul>
            <li><a href="../index.html">首页</a></li>
            <li><span>></span></li>
            <li><a href="index.html">金融服务</a></li>
            <li><span>></span></li>
            <li><a href="#">申请</a></li>
        </ul>
    </div>
</div>

<div id="content">
    <div class="container clearfix">
        <div class="finserbox finser-left">
            <h1>评价系统体系规则及填写说明</h1>
            <p class="tip" style="text-align: left;text-indent: 2em;">
            山西文化产业公共服务平台企业信用评价体系是运用互联网对企业信息进行大数据分析，评选企业信用等级。企业信用等级共分四个等级，分别是：☆☆级、☆☆☆级、☆☆☆☆级、☆☆☆☆☆级。<br>
    1、☆☆级评级标准：填写企业名称、企业法人代表,联系方式，上传企业营业执照和税务登记证。五项内容均为必填写项，信息填写不完整不予评级。<br>
    2、☆☆☆级评级标准：在☆☆级基础上填写企业职工人数、是否缴纳社会保险、缴纳社会保险人数、企业上年度水电费总额。<br>
    3、☆☆☆☆级为三星基础上填写上年度年产值、上年度销售总额，上年度纳税总额，上年度资产总额；<br>
    4、☆☆☆☆☆级：☆☆☆☆四星基础上填写上年度可抵押物资产总额，上年度资产负债率。<br>
三、此评价系统星级晋升必须满足前一星级能够达成，若未达成则保持其之前星级不变。
每年度3-6月进行信息重置，系统提前通过邮箱通知企业进行信息重置。电脑根据重置信息予以重新评定星级，逾期不予填写的系统自动删除。（后台数据保留）</p>

        </div>
        <div class="finserbox finser-right">
            <h1>山西文化产业公共服务平台企业信用评价系统</h1>
            <form method="post" enctype="multipart/form-data">
	            <dl class="clearfix">
	                <dt>企业名称：</dt><dd><input type="text" placeholder="" name="company_name" value='{$data.company_name}'><span>*（必填）</span></dd>
	                <dt>法人代表：</dt><dd><input type="text" value="{$data.representative_name}" placeholder="" name="representative_name"><span>*</span></dd>
	                <dt>联系方式：</dt><dd><input type="text" value="{$data.tel}" name="tel"><span>*</span></dd>
	                <dt>营业执照：</dt><dd>
	                	<Form function="images" parameter="licence,licence,'',content"/><span>*</span>
	                </dd>
	                <dt>税务登记证：</dt><dd>
	                	<Form function="images" parameter="tax,tax,'',content"/><span>*</span>
	                </dd>
	                <dt>企业职工人数：</dt><dd><input type="text" value="{$data.workers_num}" name="workers_num"><i>(人)</i></dd>
	                <dt>是否缴纳社会保险：</dt><dd><input type="radio" id="yes" name="is_assurance" value=1 <if condition = "$data['is_assurance'] eq 1">checked="checked"</if>/><label for="yes">是</label><input type="radio" id="no" name="is_assurance" <if condition = "$data['is_assurance'] eq 0">checked="checked"</if>  value=2 /><label for="no">否</label></dd>
	                <dt>企业上年度缴纳社会保险人数：</dt><dd><input type="text" value="{$data.prev_assurance_num}" name="prev_assurance_num"><i>(人)</i></dd>
	                <dt>企业上年度水电费合计：</dt><dd><input type="text" value="{$data.prev_electric_fee}" name="prev_electric_fee"><i>(万元)</i></dd>
	                <dt>企业上年度年产值：</dt><dd><input type="text" value="{$data.prev_output_value}" name="prev_output_value"><i>(万元)</i></dd>
	                <dt>企业上年度销售总额：</dt><dd><input type="text" value="{$data.prev_sales}" name="prev_sales"><i>(万元)</i></dd>
	                <dt>企业上年度纳税总额：</dt><dd><input type="text" value="{$data.prev_tax}" name="prev_tax"><i>(万元)</i></dd>
	                <dt>企业上年度资产总额：</dt><dd><input type="text" value="{$data.prev_assets}" name="prev_assets"><i>(万元)</i></dd>
	                <dt>企业上年度可抵押资产总额：</dt><dd><input type="text" value="{$data.prev_mortgage}" name="prev_mortgage"><i>(万元)</i></dd>
	                <dt>企业上年度资产负债率：</dt><dd><input type="text" value="{$data.prev_debt_ratio}" name="prev_debt_ratio"><i>(万元)</i></dd>
                    <input type="hidden" name="member_id" value="{$uid}">
                    <input type="hidden" name='id' value={$data.id}>
	                <dd class="btn" style="display: block;padding: 0;"><a href="javascript:;" class="true">确定</a><a href="index.html">取消</a></dd>
	            </dl>
			</form>
        </div>

    </div>
</div>



    <ul class="side-right">
    <li><a href="#"><img src="{$Config_siteurl}statics/images/service.png" alt="客服热线"></a></li>
    <li><a href="#"><img src="{$Config_siteurl}statics/images/return.png" alt="返回顶部"></a></li>
</ul>

<!--上传后的提示窗-->
	<div id="prompt" >
		<div class="prompt_div"></div>
		<div class="prompt_alert">
			<div class="prompt_pic"></div>
			<div class="prompt_content">
				<h3>恭喜您已成为<span>二星</span>级用户</h3>
				<p>是否升级为三级用户</p>
			</div>
			<div class="prompt_btn">
				<button class="yes">是的</button>
				<button class="no">否，谢谢</button>
			</div>
			
		</div>
	</div>
<!--上传后的提示窗结束-->
</block>
<block name="after_scripts">
	<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "{$config_siteurl}",
	JS_ROOT: "{$config_siteurl}statics/js/"
};
</script>
<script src="{$config_siteurl}statics/js/wind.js"></script>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
    <script type="text/javascript" src="{$Config_siteurl}statics/js/content_addtop.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
    <script>
        var uid = {$uid};
        checked_login(uid);
    </script>
	<!--异步上传信息-->
    <script type="text/javascript">
        $(function(){
            $(".btn .true").click(function(){
                var datas = $("form").serialize();
                $.post("{:U('Industry/Finance/credit_edit')}",datas,function(data){
                    if(data.status==0){
                        alert(data.message)
                    }else{
                      Wind.use("artDialog", function () {
                         art.dialog({
                            id: "succeed",
                            icon: "succeed",
                            fixed: true,
                            lock: true,
                            background: "#CCCCCC",
                            opacity: 0,
                            content: data.message,
                            button:[{
                                name: '确定',
                                callback:function(){
                                    window.location.href = "{:U('Industrymem/Industry/level')}";
                                    return true;
                                },
                                focus: true
                            }]
                         })
                      })
                    }
                },"json")
            })
        })
    </script>


</block>