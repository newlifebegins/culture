<style>
    body{margin: 20px 0;}
    .logdata dd input[type="text"] {box-sizing: content-box;}
    select,input[type="date"]{width: 33%;height: 20px;font-size: 14px;color: rgb(85, 85, 85);line-height: 34px;padding: 6px 12px;  border-width: 1px;border-style: solid;border-color: rgb(204, 204, 204);border-image: initial;border-radius: 4px;box-sizing: content-box;}
    .logdata dt{width: 25%;min-width: 270px;font-family: 'Microsoft YaHei';}
    .btn_wrap_pd{text-align: right;border-top: 1px solid #eee;padding: 10px 20px 0 0;margin: 30px 0 0 0;}
    .btn_wrap_pd .btn_submit{padding: 6px 14px;border-radius: 6px;min-width: 0;cursor: pointer;font-weight: 600;}
    .logdata dd input[type="text"].error{border-color: red;outline-color: transparent;}
    label.error{color: red;}
</style>
<form action="{:U('Admin/ComArtCenter/addVolact')}" method="post"  class="J_ajaxForm">
    <dl class="logdata">
        <dt>活动名称</dt><dd><input type="text" name='volact_title' value="{$data.volact_title}" /></dd>
        <dt>参加活动志愿者姓名</dt><dd><input type="text" name='volact_joinname' value="{$data.volact_joinname}" /></dd>
        <dt>活动时间</dt><dd><input type="text" name='volact_time' value="{$data.volact_time}" class="J_date" /></dd>
        <dt>活动地点</dt><dd><input type="text" name='volact_addr' value="{$data.volact_addr}" /></dd>
        <dt>参加活动人数</dt><dd><input type="text" name='volact_joinnum' value="{$data.volact_joinnum}" /></dd>
        <dt>活动受益人数</dt><dd><input type="text" name='volact_profitnum' value="{$data.volact_profitnum}" /></dd>
    </dl>
    <div class="btn_wrap_pd">
        <input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />
    </div>
    <input type="hidden" value="{$Think.get.idcac}" name="id_cac">
    <input type="hidden" value="{$data.id_cac_volact}" name="id_cac_volact">
</form>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<Admintemplate file="Common/submit"/>
<Admintemplate file="Common/_date"/>