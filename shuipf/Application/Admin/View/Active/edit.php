<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li><a href="{:U('lists')}">培训辅导</a></li>
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr name="selectshow">
                    <th width="147">所属地区：</th>
                    <td><select id="area" class="select_area1"></select></td>
                </tr>
                <tr>
                    <th width="147">位置：</th>
                    <td>
                        <div class="pignose-tab-container">
                            <div class="text-center" id="baiduMap"
                                 style="width:599px;height:450px;padding: 20px 0px;"></div>
                    </td>
                </tr>
            </table>
            <if condition="($data['art_cid'] eq 191) or ($data['art_cid'] eq 192) ">
                <form class="J_ajaxForm" action="{:U('edit')}" method="post">
                    <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                    <input type="hidden" name="art_cid"
                    <if condition="$data['art_cid'] eq 191 "> value="191"
                        <else/>
                        value="192"
                    </if>
                    >
                    <input type="hidden" name="form_cid" value="189">
                    <input type="hidden" name="id" value="{$data.id}">
                    <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">主标题：</th>
                            <td>
                                <input type="text" class="input" name="content_title" size="50"
                                       value="{$data.content_title}"/>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">位置:</th>
                            <td>
                                <dl class="logdata">
                                    <dt>经度坐标位置：</dt>
                                    <dd><input type="text" name="point_lng" class="input point_lng"
                                               value="{$data.point_lng}" data-lng="{$data.point_lng}"/><span></span>
                                    </dd>
                                    <dt>纬度坐标位置：</dt>
                                    <dd><input type="text" name="point_lat" class="input point_lat"
                                               value="{$data.point_lat}" data-lat="{$data.point_lat}"/><span></span>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">主办单位：</th>
                            <td>
                                <input type="text" name="host_unit" class="input" size="50" value="{$data.host_unit}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">封面：</th>
                            <td>
                                <ul class="explain">
                                    <li>文件上传:</li>
                                    <li>
                                        <a href="javascript:upfile('drama_picture')"
                                           class="seller_upload_image">上传封面</a>
                                        <p class="tips">提示：1、封面上传大小不得超过4M</p>
                                        <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张封面</p>
                                    </li>
                                </ul>
                                <ul class="img jsaddimgul" id="drama_picture">
                                    <for start="0" end="$maxPicNum">
                                        <if condition="$picture_urls[$i] neq ''">
                                            <li class=''>
                                                <input type="hidden" name="drama_picture_url[]"
                                                       value="{$picture_urls[$i]}">
                                                <img src="{$picture_urls[$i]}">
                                                <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                                        href="javascript:void(0)" class="tupian"></a></div>
                                            </li>
                                            <else/>
                                            <li class="noimg"></li>
                                        </if>
                                    </for>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">活动地点：</th>
                            <td>
                                <input type="text" class="input" name="act_address" value="{$data.act_address}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">副标题：</th>
                            <td>
                                <input type="text" class="input" name="subtitle" value="{$data.subtitle}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">活动时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="act_time" size="20"
                                       value="{$data.act_time}"></td>
                        </tr>
                        <tr>
                            <th width="147">讲座/培训-名称 ：</th>
                            <td>
                                <input type="text" class="input" name="training_title" size="20"
                                       value="{$data.training_title}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">开始时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="start_time" size="20"
                                       value="{$data.start_time}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">结束时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="end_time" size="20"
                                       value="{$data.end_time}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">培训地点：</th>
                            <td>
                                <input type="text" class="input" name="training_addr" size="20"
                                       value="{$data.training_addr}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">授课讲师：</th>
                            <td>
                                <input type="text" class="input" name="lecturer" size="20" value="{$data.lecturer}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">时长：</th>
                            <td>
                                <input type="text" class="input" name="duration" size="20" value="{$data.duration}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">参与方式：</th>
                            <td>
                                <input type="text" class="input" name="participation_mode" size="20"
                                       value="{$data.participation_mode}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">联系人：</th>
                            <td>
                                <input type="text" class="input" name="contacts" size="20" value="{$data.contacts}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">联系电话：</th>
                            <td>
                                <input type="text" class="input" name="contacts_tel" size="20"
                                       value="{$data.contacts_tel}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">容纳人数：</th>
                            <td>
                                <input type="text" class="input" name="acceptance" size="20" value="{$data.acceptance}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">是否开启预约：</th>
                            <td>
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="1" <eq name="data.if_bespeak" value="1">checked</eq> >是
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="2" <eq name="data.if_bespeak" value="2">checked</eq>>否
                            </td>
                        </tr>
                    </table>
                    <!-- </div> -->
                    <div class="">
                        <div class="btn_wrap_pd">
                            <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                        </div>
                    </div>
                </form>
            </if>
            <!-- 老人大学 -->
            <if condition="$data['art_cid'] eq 193 ">
                <form class="J_ajaxForm" action="{:U('edit')}" method="post" data-cid="193">
                    <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                    <input type="hidden" name="art_cid" value="193">
                    <input type="hidden" name="form_cid" value="193">
                    <input type="hidden" name="id" value="{$data.id}">
                    <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">封面：</th>

                            <td>
                                <ul class="explain">
                                    <li>文件上传:</li>
                                    <li>

                                        <a href="javascript:upfile('music_picture')"
                                           class="seller_upload_image">上传封面</a>
                                        <p class="tips">提示：1、封面上传大小不得超过4M</p>
                                        <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张封面</p>
                                    </li>
                                </ul>
                                <ul class="img jsaddimgul" id="music_picture">
                                    <for start="0" end="$maxPicNum">
                                        <if condition="$picture_urls[$i] neq ''">
                                            <li class=''>
                                                <input type="hidden" name="music_picture_url[]"
                                                       value="{$picture_urls[$i]}">
                                                <img src="{$picture_urls[$i]}">
                                                <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                                        href="javascript:void(0)" class="tupian"></a></div>
                                            </li>
                                            <else/>
                                            <li class="noimg"></li>
                                        </if>
                                    </for>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">简介：</th>
                            <td>
                                <textarea name="abstract" class="input_txt">{$data.abstract}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">位置:</th>
                            <td>
                                <dl class="logdata">
                                    <dt>经度坐标位置：</dt>
                                    <dd><input type="text" name="point_lng" class="input point_lng"
                                               value="{$data.point_lng}" data-lng="{$data.point_lng}"/><span></span>
                                    </dd>
                                    <dt>纬度坐标位置：</dt>
                                    <dd><input type="text" name="point_lat" class="input point_lat"
                                               value="{$data.point_lat}" data-lat="{$data.point_lat}"/><span></span>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">详情：</th>
                            <td>
                                <script type="text/plain" id="publish_content" name="publish_content">
                                    {$data.publish_content}
                                
                                
                                </script>
                                <?php echo Form::editor('publish_content', 'basic', 'Cudatabase'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">学期通知：</th>
                            <td>
                                <script type="text/plain" id="publish_content2" name="publish_ordermessage">
                                    {$data.publish_ordermessage}
                                
                                
                                </script>
                                <?php echo Form::editor('publish_content2', 'basic', 'Cudatabase'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">课程设置：</th>
                            <td>
                                <script type="text/plain" id="publish_content3" name="publish_ordersetup">
                                    {$data.publish_ordersetup}
                                
                                
                                </script>
                                <?php echo Form::editor('publish_content3', 'basic', 'Cudatabase'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">老师介绍：</th>
                            <td>
                                <script type="text/plain" id="publish_content4" name="publish_orderintroduce">
                                    {$data.publish_orderintroduce}
                                
                                
                                </script>
                                <?php echo Form::editor('publish_content4', 'basic', 'Cudatabase'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">培训地点：</th>
                            <td>
                                <input type="text" class="input" name="training_addr" value="{$data.training_addr}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">主标题：</th>
                            <td>
                                <input type="text" class="input" name="content_title" value="{$data.content_title}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">副标题：</th>
                            <td>
                                <input type="text" class="input" name="subtitle" value="{$data.subtitle}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">活动时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="act_time" size="20"
                                       value="{$data.act_time}"></td>
                        </tr>
                        <tr>
                            <th width="147">讲座/培训-名称 ：</th>
                            <td>
                                <input type="text" class="input" name="training_title" size="20"
                                       value="{$data.training_title}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">开始时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="start_time" size="20"
                                       value="{$data.start_time}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">结束时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="end_time" size="20"
                                       value="{$data.end_time}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">培训地点：</th>
                            <td>
                                <input type="text" class="input" name="training_addr" size="20"
                                       value="{$data.training_addr}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">授课讲师：</th>
                            <td>
                                <input type="text" class="input" name="lecturer" size="20" value="{$data.lecturer}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">时长：</th>
                            <td>
                                <input type="text" class="input" name="duration" size="20" value="{$data.duration}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">参与方式：</th>
                            <td>
                                <input type="text" class="input" name="participation_mode" size="20"
                                       value="{$data.participation_mode}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">联系人：</th>
                            <td>
                                <input type="text" class="input" name="contacts" size="20" value="{$data.contacts}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">联系电话：</th>
                            <td>
                                <input type="text" class="input" name="contacts_tel" size="20"
                                       value="{$data.contacts_tel}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">容纳人数：</th>
                            <td>
                                <input type="text" class="input" name="acceptance" size="20" value="{$data.acceptance}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">是否开启预约：</th>
                            <td>
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="1" <eq name="data.if_bespeak" value="1">checked</eq> >是
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="2" <eq name="data.if_bespeak" value="2">checked</eq>>否
                            </td>
                        </tr>
                    </table>
                    <if condition="$_GET['type'] neq ''">

                        <else/>
                        <div class="">
                            <div class="btn_wrap_pd">
                                <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                            </div>
                        </div>
                    </if>
                </form>
                <div class="table_list">
                    <a href="{:U('content',array('parent_id'=>$data['id']))}">添加</a>
                    <table width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <td>序号</td>
                            <td>主讲人</td>
                            <td>标题</td>
                            <td>操作</td>
                        </tr>
                        </thead>
                        <tbody>
                        <volist name="data['articel']" id="vo">
                            <tr>
                                <td align="center">{$vo.id}</td>
                                <td align="center">{$vo.lecturer}</td>
                                <td align="center">{$vo.subtitle}</td>
                                <td align="center"><a href="{:U('Admin/Active/contentedit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                                        href="{:U('Admin/Active/contentdelete', array('id'=>$vo['id']))}">[删除]</a></td>
                            </tr>
                        </volist>
                        </tbody>
                    </table>
                    <div class="p10">
                        <div class="pages"> {$pageinfo.page}</div>
                    </div>
                </div>
            </if>

            <!-- 少儿培训 -->
            <if condition="$data['art_cid'] eq 194">
                <form class="J_ajaxForm" action="{:U('edit')}" method="post" data-cid="194">
                    <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                    <input type="hidden" name="art_cid" value="194">
                    <input type="hidden" name="form_cid" value="194">
                    <input type="hidden" name="id" value="{$data.id}">
                    <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">封面：</th>

                            <td>
                                <ul class="explain">
                                    <li>文件上传:</li>
                                    <li>

                                        <a href="javascript:upfile('dance_picture')"
                                           class="seller_upload_image">上传封面</a>
                                        <p class="tips">提示：1、封面上传大小不得超过4M</p>
                                        <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张封面</p>
                                    </li>
                                </ul>
                                <ul class="img jsaddimgul" id="dance_picture">
                                    <for start="0" end="$maxPicNum">
                                        <if condition="$picture_urls[$i] neq ''">
                                            <li class=''>
                                                <input type="hidden" name="dance_picture_url[]"
                                                       value="{$picture_urls[$i]}">
                                                <img src="{$picture_urls[$i]}">
                                                <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                                        href="javascript:void(0)" class="tupian"></a></div>
                                            </li>
                                            <else/>
                                            <li class="noimg"></li>
                                        </if>
                                    </for>
                                </ul>
                            </td>
                        </tr>
                        <th width="147">简介：</th>
                        <td>
                            <textarea name="abstract" class="input_txt">{$data.abstract}</textarea>
                        </td>
                        </tr>
                        <tr>
                            <th width="147">位置:</th>
                            <td>
                                <dl class="logdata">
                                    <dt>经度坐标位置：</dt>
                                    <dd><input type="text" name="point_lng" class="input point_lng"
                                               value="{$data.point_lng}" data-lng="{$data.point_lng}"/><span></span>
                                    </dd>
                                    <dt>纬度坐标位置：</dt>
                                    <dd><input type="text" name="point_lat" class="input point_lat"
                                               value="{$data.point_lat}" data-lat="{$data.point_lat}"/><span></span>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">详情：</th>
                            <td>
                                <script type="text/plain" id="publish_content11" name="publish_content">
                                    {$data.publish_content}
                                
                                
                                </script>
                                <?php echo Form::editor('publish_content11', 'basic', 'Cudatabase'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">学期通知：</th>
                            <td>
                                <script type="text/plain" id="publish_content12" name="publish_ordermessage">
                                    {$data.publish_ordermessage}
                                
                                
                                </script>
                                <?php echo Form::editor('publish_content12', 'basic', 'Cudatabase'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">课程设置：</th>
                            <td>
                                <script type="text/plain" id="publish_content13" name="publish_ordersetup">
                                    {$data.publish_ordersetup}
                                
                                
                                </script>
                                <?php echo Form::editor('publish_content13', 'basic', 'Cudatabase'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">老师介绍：</th>
                            <td>
                                <script type="text/plain" id="publish_content14" name="publish_orderintroduce">
                                    {$data.publish_orderintroduce}
                                
                                
                                </script>
                                <?php echo Form::editor('publish_content14', 'basic', 'Cudatabase'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">主标题：</th>
                            <td>
                                <input type="text" class="input" name="content_title" value="{$data.content_title}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">副标题：</th>
                            <td>
                                <input type="text" class="input" name="subtitle" value="{$data.subtitle}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">活动时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="act_time" size="20"
                                       value="{$data.act_time}"></td>
                        </tr>
                        <tr>
                            <th width="147">讲座/培训-名称 ：</th>
                            <td>
                                <input type="text" class="input" name="training_title" size="20"
                                       value="{$data.training_title}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">开始时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="start_time" size="20"
                                       value="{$data.start_time}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">结束时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="end_time" size="20"
                                       value="{$data.end_time}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">培训地点：</th>
                            <td>
                                <input type="text" class="input" name="training_addr" size="20"
                                       value="{$data.training_addr}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">授课讲师：</th>
                            <td>
                                <input type="text" class="input" name="lecturer" size="20" value="{$data.lecturer}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">时长：</th>
                            <td>
                                <input type="text" class="input" name="duration" size="20" value="{$data.duration}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">参与方式：</th>
                            <td>
                                <input type="text" class="input" name="participation_mode" size="20"
                                       value="{$data.participation_mode}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">联系人：</th>
                            <td>
                                <input type="text" class="input" name="contacts" size="20" value="{$data.contacts}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">联系电话：</th>
                            <td>
                                <input type="text" class="input" name="contacts_tel" size="20"
                                       value="{$data.contacts_tel}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">容纳人数：</th>
                            <td>
                                <input type="text" class="input" name="acceptance" size="20" value="{$data.acceptance}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">是否开启预约：</th>
                            <td>
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="1" <eq name="data.if_bespeak" value="1">checked</eq> >是
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="2" <eq name="data.if_bespeak" value="2">checked</eq>>否
                            </td>
                        </tr>
                    </table>
                    <if condition="$_GET['type'] neq ''">

                        <else/>
                        <div class="">
                            <div class="btn_wrap_pd">
                                <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                            </div>
                        </div>
                    </if>
                </form>
                <div class="table_list">
                    <a href="{:U('content',array('parent_id'=>$data['id']))}">添加</a>
                    <table width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <td>序号</td>
                            <td>主讲人：</td>
                            <td>标题</td>
                            <td>操作</td>
                        </tr>
                        </thead>
                        <tbody>
                        <volist name="data['articel']" id="vo">
                            <tr>
                                <td align="center">{$vo.id}</td>
                                <td align="center">{$vo.lecturer}</td>
                                <td align="center">{$vo.subtitle}</td>
                                <td align="center"><a href="{:U('Admin/Active/contentedit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a
                                        href="{:U('Admin/Active/contentdelete', array('id'=>$vo['id']))}">[删除]</a></td>
                            </tr>
                        </volist>
                        </tbody>
                    </table>
                    <div class="p10">
                        <div class="pages"> {$pageinfo.page}</div>
                    </div>
                </div>
            </if>
            <!-- 基层辅导 -->
            <if condition="$data['art_cid']  eq '195'">
                <form class="J_ajaxForm" action="{:U('edit')}" method="post" data-cid="195">
                    <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                    <input type="hidden" name="art_cid" value="195">
                    <input type="hidden" name="form_cid" value="195">
                    <input type="hidden" name="id" value="{$data.id}">
                    <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">主标题：</th>
                            <td>
                                <input type="text" class="input" name="content_title" size="50"
                                       value="{$data.content_title}"/>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">位置:</th>
                            <td>
                                <dl class="logdata">
                                    <dt>经度坐标位置：</dt>
                                    <dd><input type="text" name="point_lng" class="input point_lng"
                                               value="{$data.point_lng}" data-lng="{$data.point_lng}"/><span></span>
                                    </dd>
                                    <dt>纬度坐标位置：</dt>
                                    <dd><input type="text" name="point_lat" class="input point_lat"
                                               value="{$data.point_lat}" data-lat="{$data.point_lat}"/><span></span>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">简介：</th>
                            <td>
                                <textarea name="abstract" class="input_txt">{$data.abstract}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">封面：</th>
                            <td>
                                <ul class="explain">
                                    <li>文件上传:</li>
                                    <li>
                                        <a href="javascript:upfile('art_picture')" class="seller_upload_image">上传封面</a>
                                        <p class="tips">提示：1、封面上传大小不得超过4M</p>
                                        <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张封面</p>
                                    </li>
                                </ul>
                                <ul class="img jsaddimgul" id="art_picture">
                                    <for start="0" end="$maxPicNum">
                                        <if condition="$picture_urls[$i] neq ''">
                                            <li class=''>
                                                <input type="hidden" name="art_picture_url[]"
                                                       value="{$picture_urls[$i]}">
                                                <img src="{$picture_urls[$i]}">
                                                <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                                        href="javascript:void(0)" class="tupian"></a></div>
                                            </li>
                                            <else/>
                                            <li class="noimg"></li>
                                        </if>
                                    </for>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">活动地点：</th>
                            <td>
                                <input type="text" class="input" name="act_address" value="{$data.act_address}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">副标题：</th>
                            <td>
                                <input type="text" class="input" name="subtitle" value="{$data.subtitle}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">活动时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="act_time" size="20"
                                       value="{$data.act_time}"></td>
                        </tr>
                        <tr>
                            <th width="147">讲座/培训-名称 ：</th>
                            <td>
                                <input type="text" class="input" name="training_title" size="20"
                                       value="{$data.training_title}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">开始时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="start_time" size="20"
                                       value="{$data.start_time}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">结束时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="end_time" size="20"
                                       value="{$data.end_time}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">培训地点：</th>
                            <td>
                                <input type="text" class="input" name="training_addr" size="20"
                                       value="{$data.training_addr}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">授课讲师：</th>
                            <td>
                                <input type="text" class="input" name="lecturer" size="20" value="{$data.lecturer}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">时长：</th>
                            <td>
                                <input type="text" class="input" name="duration" size="20" value="{$data.duration}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">参与方式：</th>
                            <td>
                                <input type="text" class="input" name="participation_mode" size="20"
                                       value="{$data.participation_mode}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">联系人：</th>
                            <td>
                                <input type="text" class="input" name="contacts" size="20" value="{$data.contacts}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">联系电话：</th>
                            <td>
                                <input type="text" class="input" name="contacts_tel" size="20"
                                       value="{$data.contacts_tel}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">容纳人数：</th>
                            <td>
                                <input type="text" class="input" name="acceptance" size="20" value="{$data.acceptance}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">详情：</th>
                            <td>
                                <script type="text/plain" id="publish_content15" name="publish_ordersetup">
                                    {$data.publish_ordersetup}
                                
                                
                                </script>
                                <?php echo Form::editor('publish_content15', 'basic', 'Cudatabase'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">是否开启预约：</th>
                            <td>
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="1" <eq name="data.if_bespeak" value="1">checked</eq> >是
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="2" <eq name="data.if_bespeak" value="2">checked</eq>>否
                            </td>
                        </tr>
                    </table>
                    <!-- </div> -->
                    <div class="">
                        <div class="btn_wrap_pd">
                            <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                        </div>
                    </div>
                </form>
            </if>
            <!-- 群文讲座   -->
            <if condition="$data['art_cid'] eq 196">
                <form class="J_ajaxForm" action="{:U('edit')}" method="post" data-cid="196">
                    <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                    <input type="hidden" name="art_cid" value="196">
                    <input type="hidden" name="form_cid" value="196">
                    <input type="hidden" name="id" value="{$data.id}">
                    <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">主标题：</th>
                            <td>
                                <input type="text" class="input" name="content_title" size="50"
                                       value="{$data.content_title}"/>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">位置:</th>
                            <td>
                                <dl class="logdata">
                                    <dt>经度坐标位置：</dt>
                                    <dd><input type="text" name="point_lng" class="input point_lng"
                                               value="{$data.point_lng}" data-lng="{$data.point_lng}"/><span></span>
                                    </dd>
                                    <dt>纬度坐标位置：</dt>
                                    <dd><input type="text" name="point_lat" class="input point_lat"
                                               value="{$data.point_lat}" data-lat="{$data.point_lat}"/><span></span>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">简介：</th>
                            <td>
                                <textarea name="abstract" class="input_txt">{$data.abstract}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">封面：</th>
                            <td>
                                <ul class="explain">
                                    <li>文件上传:</li>
                                    <li>
                                        <a href="javascript:upfile('folk_picture')" class="seller_upload_image">上传封面</a>
                                        <p class="tips">提示：1、封面上传大小不得超过4M</p>
                                        <p class="tips">2、本类目下您最多可以上传{$maxPicNum}张封面</p>
                                    </li>
                                </ul>
                                <ul class="img jsaddimgul" id="folk_picture">
                                    <for start="0" end="$maxPicNum">
                                        <if condition="$picture_urls[$i] neq ''">
                                            <li class=''>
                                                <input type="hidden" name="folk_picture_url[]"
                                                       value="{$picture_urls[$i]}">
                                                <img src="{$picture_urls[$i]}">
                                                <div class="operate"><span class="sl"></span><span class="sr"></span><a
                                                        href="javascript:void(0)" class="tupian"></a></div>
                                            </li>
                                            <else/>
                                            <li class="noimg"></li>
                                        </if>
                                    </for>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">活动地点：</th>
                            <td>
                                <input type="text" class="input" name="act_address" value="{$data.act_address}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">副标题：</th>
                            <td>
                                <input type="text" class="input" name="subtitle" value="{$data.subtitle}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">活动时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="act_time" size="20"
                                       value="{$data.act_time}"></td>
                        </tr>
                        <tr>
                            <th width="147">讲座/培训-名称 ：</th>
                            <td>
                                <input type="text" class="input" name="training_title" size="20"
                                       value="{$data.training_title}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">开始时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="start_time" size="20"
                                       value="{$data.start_time}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">结束时间：</th>
                            <td>
                                <input type="text" class="input J_date" name="end_time" size="20"
                                       value="{$data.end_time}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">培训地点：</th>
                            <td>
                                <input type="text" class="input" name="training_addr" size="20"
                                       value="{$data.training_addr}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">授课讲师：</th>
                            <td>
                                <input type="text" class="input" name="lecturer" size="20" value="{$data.lecturer}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">时长：</th>
                            <td>
                                <input type="text" class="input" name="duration" size="20" value="{$data.duration}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">参与方式：</th>
                            <td>
                                <input type="text" class="input" name="participation_mode" size="20"
                                       value="{$data.participation_mode}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">联系人：</th>
                            <td>
                                <input type="text" class="input" name="contacts" size="20" value="{$data.contacts}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">联系电话：</th>
                            <td>
                                <input type="text" class="input" name="contacts_tel" size="20"
                                       value="{$data.contacts_tel}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">容纳人数：</th>
                            <td>
                                <input type="text" class="input" name="acceptance" size="20" value="{$data.acceptance}">
                            </td>
                        </tr>
                        <tr>
                            <th width="147">详情：</th>
                            <td>
                                <script type="text/plain" id="publish_content16" name="publish_ordersetup">
                                    {$data.publish_ordersetup}
                                
                                
                                </script>
                                <?php echo Form::editor('publish_content16', 'basic', 'Cudatabase'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">是否开启预约：</th>
                            <td>
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="1" <eq name="data.if_bespeak" value="1">checked</eq> >是
                                <input type="radio" class="if_bespeak" name="if_bespeak"  value="2" <eq name="data.if_bespeak" value="2">checked</eq> >否
                            </td>
                        </tr>
                    </table>
                    <!-- </div> -->
                    <div class="">
                        <div class="btn_wrap_pd">
                            <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
                        </div>
                    </div>
                </form>
            </if>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YUYIzLKGEcKdyyat23Aw4H9LByDx4voy"></script>
<!--百度地图API  地区边界用-->
<script type="text/javascript"
        src="http://api.map.baidu.com/library/AreaRestriction/1.2/src/AreaRestriction_min.js"></script>
<script type="text/javascript">
    <?php

    $alowexts = "jpg|jpeg|gif|bmp|png";
    $thumb_ext = ",";
    $watermark_setting = 0;
    $module = "Content";
    $catid = "0";
    $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upfile(id) {
        flashupload(id + '_images', '封面上传', id, submit_pic, '{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey}');
    }

    function submit_pic(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var in_content = d.$("#att-status").html().substring(1);
        var contents = in_content.split('|');
        if (contents == '') return true;
        $.each(contents, function (i, n) {
            var str = "<input type='hidden' name='" + returnid + "_url[]' value='" + n +
                "'><img src='" + n + "'><div class='operate'><span class='sl'></span>" +
                "<span class='sr'></span><a href=\"javascript:void(0)\" class='tupian' ></a></div>";
            $('#' + returnid).find(".noimg:first").html(str);
            $('#' + returnid).find(".noimg:first").removeClass("noimg");
        });
    }

    /*封面移动*/
    $(".jsaddimgul").on("click", "li span", function () {
        var $ul1 = $(this).parent().parent();
        if ($(this).hasClass("sl")) {
            var $ul2 = $(this).parent().parent().prev("li");
        }
        else {
            var $ul2 = $(this).parent().parent().next("li");
        }
        var ulhtml1 = $ul1.html();
        var ulhtml2 = $ul2.html();
        $ul1.html(ulhtml2);
        $ul2.html(ulhtml1);
        if ($ul2.hasClass("noimg")) {
            $ul2.removeClass("noimg");
            $ul1.addClass("noimg");
        }
    })
    $(".jsaddimgul").on("click", "li a", function () {
        var $li = $(this).parent().parent();
        $li.addClass("noimg");
        $li.empty();
    })
    <?php
    $authkey_video = upload_key("$maxVideoNum,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upvideo(id) {
        videoupload(id + '_upload', '视频上传', id, submit_video, '{$maxVideoNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey_video}')
    }

    function submit_video(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var video_id = d.$("#video-id").html();
        var video_title = d.$("#video-title").html();
        // console.log(video_id);
        video_html = '<li><input type="text" class="input" name="' + returnid + '[]" size="20" value="' + video_id + '" hidden /></li>';
        video_html += '<li><input type="text" class="input input-video" name="' + returnid + '_title[]" size="20" value="' + video_title + '" readonly="readonly" /><span>审核中...</span></li>';
        //只能上传一个视频,如果需要改变上传限制,所有视频的show页面都必须进行修改
        $('#' + returnid).html(video_html);

    }

    //地图
    $(function () {
        //百度地图
        var map = new BMap.Map("baiduMap"); // 创建Map实例
        //根据IP 显示当前城市
        function displayLocalCity(result) {
            var cityName = result.name;
            if (cityName == 'undefined' || cityName == 'null' || cityName == '') {
                cityName = '太原';  //默认为太原
            }
            map.setCenter(cityName);
            map.centerAndZoom(cityName, 12);
        }

        var myCity = new BMap.LocalCity();
        myCity.get(displayLocalCity);
        //设置显示范围 为山西省内  坐标移出省外自动跳回  
        var b = new BMap.Bounds(new BMap.Point(109.884727, 34.424947), new BMap.Point(115.210744, 41.144106)); //创建一个包含所有给定点坐标的矩形区域,原型Bounds(minX:Number, minY:Number, maxX:Number, maxY:Number)
        try {
            BMapLib.AreaRestriction.setBounds(map, b);
        } catch (e) {
            alert(e);
        }
        var point_lng = {$data.point_lng |
        default
        = 0
    }
        ;
        var point_lat = {$data.point_lat |
        default
        = 0
    }
        ;
        if (point_lng != 0 && point_lat != 0) {
            var point = new BMap.Point(point_lng, point_lat); //创建一个地理坐标点。
            //创建地图上一个图像标注。
            var marker = new BMap.Marker(point);
            //给图像标注添加点击事件 
            // marker.addEventListener("click",attribute);    
            // 将标注添加到地图中
            map.addOverlay(marker);
        }

        //开启鼠标滚轮
        map.enableScrollWheelZoom(true);
        map.addEventListener("click", showInfo); //添加地图点击事件

        //点击事件回调函数，填充经纬度
        function showInfo(e) {
            //清楚所有覆盖物
            map.clearOverlays();
            //生成当前坐标
            var marker = new BMap.Marker(new BMap.Point(e.point.lng, e.point.lat));
            // 将标注添加到地图中
            map.addOverlay(marker);
            //填充form表单
            $(".point_lng").val(e.point.lng);
            $(".point_lat").val(e.point.lat);
        }
    });
</script>
<Admintemplate file="Common/submit"/>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
</body>
</html>