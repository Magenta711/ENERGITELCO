<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class system_setting extends Model
{
    protected $table = "system_settings";
    protected $fillable = ['url','approval_emails','emails_before_approval','emails_cvs','emails_ccjl','emails_contable','emails_error','name_responsable','tel_responsable','email_responsable','state','file_main','file_main_small','file_ccjl','file_claro','file_cc','file_mintic','messege_intro','employee_month','birthday','active_24_7','test_intro'];
    protected $guarder = ['id'];
}
