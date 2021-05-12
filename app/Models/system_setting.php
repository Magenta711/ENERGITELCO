<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class system_setting extends Model
{
    protected $table = "system_settings";
    protected $fillable = ['url','approval_emails','emails_before_approval','emails_cvs','emails_ccjl','emails_contable','emails_error','name_responsable','tel_responsable','email_responsable','state'];
    protected $guarder = ['id'];
}
