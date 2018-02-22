<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">

    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <style>
       .add{ font-size: 16px;
    height: 23px;
    line-height: 23px;
    text-align: center;
    width: 72px;
background: #fff;
border: 1px solid #676767;margin-right: 10px}
       form .clearfix span{
            color: red;
        }
        #content .industry .industry-right dd.industry_btn{margin: 20px 0 20px 500px;}
    </style>
</block>
<block name="content">
<div id="nav">
    <div class="container">
        <ul>
            <li><a href="{:U('Industry/Index/index')}" class="home_src">首页</a></li>
            <li><span>></span></li>
            <li><a href="index.html">产业项目</a></li>
            <li><span>></span></li>
            <li><a href="#" style="color: #2058c2;">发布系统</a></li>
        </ul>
    </div>
</div>
<div id="content">
    <div class="container industry clearfix">
        <div class="industry-left"  style="padding-top:0px;">
             <div style="width:255px;height:95px;background-color:#962626;">
                 <h3 style="padding-top:35px;padding-left:75px;color:#FFF;">发布系统</h3>
                </div>
            <ul>
                <li><a href="#"><span>●</span>发布系统</a></li>
            </ul>
        </div>
        <div class="industry-right">
            <h5><span>发布系统</span></h5>


            <form  method="post" action="{:U('Industry/Industry/add_obj_table')}">

                <dl class="clearfix">
                    <dt>企业名称：</dt><dd><input type="text" value="" placeholder="" name="cname"><span>* (必填)</span></dd>
                    <dt>项目名称：</dt><dd><input type="text" value="" placeholder="" name="pname"><span>*</span></dd>
                    <dt>项目所在地：</dt>
                    <dd class="ddarea">
                        <select id="area" class="LinkageSel" name="area[]"></select>
                        <input type="hidden" name="area" class="area" value=""/>
                    </dd>
                    <dt>项目类别：</dt>
                    <dd>
                        <select name="pcategory" id="" >
                            <option value="0">请选择</option>
                            <volist name="industry_category" id="vo">
                                <option value="{$vo.id}">{$vo.categoryname}</option>
                            </volist>
                        </select>
                    </dd>
                    <dt>项目投资总额：</dt><dd><input type="text" value="" name="plimit"><i>(万元)</i><span>*</span></dd>
                    <dt>项目负责人：</dt><dd><input type="text" value="" name="pleader"><span>*</span></dd>
                    <dt>联系电话：</dt><dd><input type="text" value="" name="contactnum"><span>*</span>(固定电话格式，如：010-8888888)</dd>
                    <dt>项目所在地：</dt><dd><input type="text" value="" name="plocation"><span>*</span></dd>
                    <dt>项目简介：</dt><dd><input type="text" value="" name="pbriefing"><span>*</span></dd>
                    <dt>项目阶段：</dt>
                    <dd>
                        <select name="pstage" id="" >
                            <option value="0">请选择</option>
                            <volist name='industry_stage' id ='vo'>
                                <option value="{$vo.sid}">{$vo.stagename}</option>
                            </volist>
                            
                        </select>
                    </dd>
                    <dt>项目前景：</dt><dd><textarea name="prospect" id="" cols="30" rows="10" placeholder=""></textarea><span>*</span></dd>
                    <dt>项目图片：</dt><dd class="img" style="height: auto"><Form function="images" parameter="pthumb,pthumb,'',content"/><span>*（图片大小，分辨率，格式要求）</span></dd>
                    <dt>进入投融资项目库：</dt><dd><input type="radio" id="yes" name="pfinancing" value="1" checked="checked"/><label for="yes">是</label><input type="radio" id="no" name="pfinancing" value="0"/><label for="no">否</label></dd>
                    <!--<dt>项目负责人：</dt><dd><input type="hidden" value="{uid}" name="uid"></dd>-->
					
                    <input type="hidden" value="1" name="type">
                    <input type="hidden" name="uid" value="{$uid}">
                     <dd class="btn industry_btn"><input type="submit" value="确定" class="add"><a href="{:U('Industry/Industry/personal_project')}">取消</a></dd>
                </dl>


            </form>


        </div>
    </div>
</div>

</block>
<block name="after_scripts">
    <script type="text/javascript">
        //全局变量
        var GV = {
            DIMAUB: "{$config_siteurl}",
            JS_ROOT: "{$config_siteurl}statics/js/"
        };
    </script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
    <script>
        var uid = {$uid};
        checked_login(uid);
    </script>
    <script src="{$config_siteurl}statics/js/wind.js"></script>

    <script type="text/javascript" src="{$Config_siteurl}statics/js/content_addtop.js"></script>
<script>
    function openurl(){
        var radios=document.getElementsByName("judge");

        for(var i=0;i<radios.length;i++){
            if(radios[i].checked){
                var n=radios[i].value;

                if(n==1){
                    window.location.href="system-yes.html"
                }
                else if(n==0){
                    location.href="system-no.html"
                }
            }
        }
    }
</script>
<script>
//     $(function(){
//         $(".top_menuItem").eq(3).addClass("choose");


//         $(".publish").on("click",function(){
//             layer.msg('请先登录',{
// //                回调函数
//                 end: function(){
//                     window.location.href = '{:U()}';
//                 }
//             });
//             return false;
//         });
//     });
</script>



    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/comm.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/linkagesel.js"></script>
    <script>

        var opts = {
            ajax: "/index.php?g=Api&m=Area&a=ajax",
            selStyle: 'margin-left: 6px;',
            select:  '#area',
            head: '请选择',
            defVal: [4,84,],
            selName:'area[]',
            level: 3,
        };
        var linkageSel = new LinkageSel(opts);

        linkageSel.onChange(function() {
            var selected = linkageSel.getSelectedArr();
            $(".area").val(selected.toString());
        });
    </script>
   
</block>

