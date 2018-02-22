<style>
    body{margin: 20px 0;}
    .logdata dd input[type="text"] {box-sizing: content-box;}
    select,input[type="date"]{width: 33%;height: 20px;font-size: 14px;color: rgb(85, 85, 85);line-height: 34px;padding: 6px 12px;  border-width: 1px;border-style: solid;border-color: rgb(204, 204, 204);border-image: initial;border-radius: 4px;box-sizing: content-box;}
    .logdata dt{width: 25%;min-width: 270px;font-family: 'Microsoft YaHei';}
    .btn_wrap_pd{text-align: right;border-top: 1px solid #eee;padding: 10px 20px 0 0;margin: 30px 0 0 0;}
    .btn_wrap_pd .btn_submit{padding: 6px 14px;border-radius: 6px;min-width: 0;cursor: pointer;font-weight: 600;}
</style>
<form action="{:U('Admin/Library/addVolunteer')}" method="post"  class="J_ajaxForm">
    <dl class="logdata">
        <dt>姓名</dt><dd><input type="text" name='vol_name' value="{$data.vol_name}" /></dd>
        <dt>性别</dt><dd><input type="radio" name="vol_sex"  value=1 <eq name="data.vol_sex" value="1">checked</eq> /> <label for="">男</label><input type="radio" name="vol_sex"  value=2 <eq name="data.vol_sex" value="2">checked</eq> /><label for="">女</label></dd>
        <dt>民族</dt><dd><input type="text" name='vol_nation' value="{$data.vol_nation}" /></dd>
        <dt>出生日期</dt><dd><input type="text" name='vol_birthday' value="{$data.vol_birthday}" class="J_date" /></dd>
        <dt>政治面貌</dt><dd><input type="text" name='vol_pol_status' value="{$data.vol_pol_status}" /></dd>
        <dt>毕业院校</dt><dd><input type="text" name='vol_schooltag' value="{$data.vol_schooltag}" /></dd>
        <dt>毕业时间</dt><dd><input type="text" name='vol_graduate_date' value="{$data.vol_graduate_date}" class="J_date" /></dd>
        <dt>所学专业</dt><dd><input type="text" name='vol_major' value="{$data.vol_major}" /></dd>
        <dt>学历</dt><dd><input type="text" name='vol_edu_bg' value="{$data.vol_edu_bg}" /></dd>
        <dt>学位</dt><dd><input type="text" name='vol_edu_degree' value="{$data.vol_edu_degree}" /></dd>
        <dt>加入志愿者日期</dt><dd><input type="text" name="vol_begin_date"  value="{$data.vol_begin_date}" class="J_date" /></dd>
        <dt>工作单位</dt><dd><input type="text" name='vol_company' value="{$data.vol_company}" /></dd>
        <dt>教育程度</dt><dd><input type="text" name='vol_degree' value="{$data.vol_degree}" /></dd>
        <dt>专长</dt><dd><input type="text" name="vol_speciality"  value="{$data.vol_speciality}" /></dd>
    </dl>
    <div class="btn_wrap_pd">
        <input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />
    </div>
    <input type="hidden" value="{$Think.get.idlib}" name="library_id_lib">
    <input type="hidden" value="{$data.id_lib_vol}" name="id_lib_vol">
</form>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<Admintemplate file="Common/submit"/>
<Admintemplate file="Common/_date"/>