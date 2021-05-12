<?php

namespace App\Models\project\planing;

use App\Models\Work1;
use Illuminate\Database\Eloquent\Model;
use App\User;
use DateTime;

class Project extends Model
{
    protected $table = "projects";
    protected $fillable = ['project_main_id','responsable_id','project_name','comentary','start_date','start_time','end_date','end_time','rf','withOVP','whitPower','sector_1','sector_2','sector_3','sector_4','mw','marckup_total','total_installation_phase','total_deliverables_phase','total_on_air_phase','total_field_phases','total_control_phase','total_days_project','consumables_cost','final_percentage','accepted_percentage','state','percentage','suspension_date','days_suspension'];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(ProjectActivities::class, 'id', 'project_main_id');
    }

    public function responsable()
    {
        return $this->hasOne(User::class, 'id', 'responsable_id');
    }

    public function permissions()
    {
        return $this->hasMany(Work1::class, 'project_id', 'id');
    }

    public function time_plannings()
    {
        return $this->hasMany(ProjectTimePlanning::class, 'project_id', 'id');
    }

    public function assingTimePlanning($id_item,$amount,$total_days,$times,$total_days_checked,$phase_item,$comentaries)
    {
        $cont = 0;
        if ($id_item) {
            for ($i=0; $i < count($id_item); $i++) {
                $time_id = ProjectTimePlanning::create([
                    'project_id' => $this->id,
                    'project_activity_id' => $id_item[$i],
                    'amount' => $amount[$i],
                    'phase_item' => $phase_item[$i],
                    'total_days' => $total_days[$i],
                    'comentaries' => $comentaries[$i],
                ]);
    
                for ($j=0; $j < $total_days_checked[$i]; $j++) {
                    ProjectTimePlanningDetail::create([
                        'planning_id' => $time_id->id,
                        'time_id' => $times[$cont],
                    ]);
                    $cont++;
                }
            }
        }
    }
    
    public function time_controls()
    {
        return $this->hasMany(ProjectTimePlanningControl::class, 'project_id', 'id');
    }
    
    public function deliverables()
    {
        return $this->hasMany(ProjectDeliverable::class, 'project_id', 'id');
    }

    public function assingTimeControl($number_hours,$delivery_feedback)
    {
        for ($i=0; $i < count($number_hours); $i++) { 
            ProjectTimePlanningControl::create([
                'project_id' => $this->id,
                'item' => $i,
                'number_hours' => $number_hours[$i],
                'delivery_feedback' => $delivery_feedback[$i],
            ]);
        }
    }

    
    public function consumables()
    {
        return $this->hasMany(ProjectConsumables::class, 'project_id', 'id');
    }
    

    public function assingMaterialsRf($material_rf)
    {
        $materials = Material::get();
        $i = 0;
        foreach ($materials as $value) {
            if ($value->project_type == 2 && $value->place == 1){
                ProjectConsumables::create([
                    'project_id' => $this->id,
                    'material_id' => $value->id,
                    'type' => 2,
                    'place' => 1,
                    'value' => $material_rf[$i],
                ]);
                $i++;
            }
        }
    }
    public function assingMeasuredRf($measured_rf)
    {
        $materials = Material::get();
        $i = 0;
        foreach ($materials as $value) {
            if ($value->project_type == 2 && $value->place == 2){
                ProjectConsumables::create([
                    'project_id' => $this->id,
                    'material_id' => $value->id,
                    'type' => 2,
                    'place' => 2,
                    'value' => $measured_rf[$i],
                ]);
                $i++;
            }
        }
    }
    public function assingMaterialsMw($material_mw)
    {
        $materials = Material::get();
        $i = 0;
        foreach ($materials as $value) {
            if ($value->project_type == 3 && $value->place == 1){
                ProjectConsumables::create([
                    'project_id' => $this->id,
                    'material_id' => $value->id,
                    'type' => 3,
                    'place' => 1,
                    'value' => $material_mw[$i],
                ]);
                $i++;
            }
        }
    }
    public function assingMeasuredMw($measured_mw)
    {
        $materials = Material::get();
        $i = 0;
        foreach ($materials as $value) {
            if ($value->project_type == 3 && $value->place == 2){
                ProjectConsumables::create([
                    'project_id' => $this->id,
                    'material_id' => $value->id,
                    'type' => 3,
                    'place' => 2,
                    'value' => $measured_mw[$i],
                ]);
                $i++;
            }
        }
    }

    public function lenght()
    {
        return $this->hasMany(ProjectConsumablesLenght::class, 'project_id', 'id');
    }

    public function assingLength($lenght)
    {
        $materials = Material::get();
        $i = 0;
        foreach ($materials as $value) {
            if($value->hasLength){
                ProjectConsumablesLenght::create([
                    'project_id' => $this->id,
                    'material_id' => $value->id,
                    'value' => $lenght[$value->id] ? $lenght[$value->id] : 0,
                ]);
            }
        }
    }

    public function assingTagsRf(array $questions = null, array $sector = null)
    {
        if($questions){
            for ($i=0; $i < count($questions); $i++) { 
                if($questions[$i] == 1){
                    $this->update([
                        'whitOVP' => 1,
                    ]);
                }
                if($questions[$i] == 2){
                    $this->update([
                        'whitPower' => 1,
                    ]);
                }
            }
        }
        if($sector){
            for ($i=0; $i < count($sector); $i++) {
                switch ($sector[$i]) {
                    case '1':
                        $this->update([
                            'sector_1' => 1,
                        ]);
                        break;
                    case '2':
                        $this->update([
                            'sector_2' => 1,
                        ]);
                        break;
                    case '3':
                        $this->update([
                            'sector_3' => 1,
                        ]);
                        break;
                    case '4':
                        $this->update([
                            'sector_4' => 1,
                        ]);
                        break;
                } 
            }
        }
    }

    public function MakeupMw_1_1()
    {
        return $this->hasOne(MakeupMw_1_1::class, 'project_id', 'id');
    }
    public function MakeupMw_1_2()
    {
        return $this->hasOne(MakeupMw_1_2::class, 'project_id', 'id');
    }
    public function MakeupMw_1_3()
    {
        return $this->hasOne(MakeupMw_1_3::class, 'project_id', 'id');
    }
    public function MakeupMw_1_4()
    {
        return $this->hasOne(MakeupMw_1_4::class, 'project_id', 'id');
    }
    public function MakeupMw_1_5()
    {
        return $this->hasOne(MakeupMw_1_5::class, 'project_id', 'id');
    }
    public function MakeupMw_2_1()
    {
        return $this->hasOne(MakeupMw_2_1::class, 'project_id', 'id');
    }
    public function MakeupMw_2_2()
    {
        return $this->hasOne(MakeupMw_2_2::class, 'project_id', 'id');
    }
    public function MakeupMw_3()
    {
        return $this->hasOne(MakeupMw_3::class, 'project_id', 'id');
    }

    public function editAssingTimePlanning($id_item,$amount,$total_days,$times,$total_check_days,$phase_item,$comentaries)
    {
        $plaings = ProjectTimePlanning::where('project_id',$this->id)->get();
        foreach ($plaings as $time){
            ProjectTimePlanningDetail::where('planning_id',$time->id)->delete();
            $time->delete();
        }
        $cont = 0;
        if ($id_item) {
            for ($i=0; $i < count($id_item); $i++) {
                $time_id = ProjectTimePlanning::create([
                    'project_id' => $this->id,
                    'project_activity_id' => $id_item[$i],
                    'amount' => $amount[$i],
                    'phase_item' => $phase_item[$i],
                    'total_days' => $total_days[$i],
                    'comentaries' => $comentaries[$i],
                ]);
                for ($j=0; $j < $total_check_days[$i]; $j++) {
                    ProjectTimePlanningDetail::create([
                        'planning_id' => $time_id->id,
                        'time_id' => $times[$cont],
                    ]);
                    $cont++;
                }
            }
        }
    }

    public function editAssingTimeControl($number_hours,$delivery_feedback)
    {
        for ($i=0; $i < count($number_hours); $i++) { 
            ProjectTimePlanningControl::where('project_id',$this->id)->where('item',$i)->update([
                'number_hours' => $number_hours[$i],
                'delivery_feedback' => $delivery_feedback[$i],
            ]);
        }
    }

    public function editAssingMaterialsRf($material_rf)
    {
        $materials = Material::get();
        $i = 0;
        foreach ($materials as $value) {
            if ($value->project_type == 2 && $value->place == 1){
                ProjectConsumables::where('project_id',$this->id)->where('material_id',$value->id)->update([
                    'value' => $material_rf[$i],
                ]);
                $i++;
            }
        }
    }

    public function editAssingMeasuredRf($measured_rf)
    {
        $materials = Material::get();
        $i = 0;
        foreach ($materials as $value) {
            if ($value->project_type == 2 && $value->place == 2){
                ProjectConsumables::where('project_id',$this->id)->where('material_id',$value->id)->update([
                    'value' => $measured_rf[$i],
                ]);
                $i++;
            }
        }
    }

    public function editAssingMaterialsMw($material_mw)
    {
        $materials = Material::get();
        $i = 0;
        foreach ($materials as $value) {
            if ($value->project_type == 3 && $value->place == 1){
                ProjectConsumables::where('project_id',$this->id)->where('material_id',$value->id)->update([
                    'value' => $material_mw[$i],
                ]);
                $i++;
            }
        }
    }

    public function editAssingMeasuredMw($measured_mw)
    {
        $materials = Material::get();
        $i = 0;
        foreach ($materials as $value) {
            if ($value->project_type == 3 && $value->place == 2){
                ProjectConsumables::where('project_id',$this->id)->where('material_id',$value->id)->update([
                    'value' => $measured_mw[$i],
                ]);
                $i++;
            }
        }
    }

    public function editAssingLength($lenght)
    {
        $materials = Material::get();
        $i = 0;
        foreach ($materials as $value) {
            if($value->hasLength){
                ProjectConsumablesLenght::where('project_id',$this->id)->where('material_id',$value->id)->update([
                    'value' => $lenght[$value->id],
                ]);
            }
        }
    }

    public function editAssingDeliverables($deliverable_project,$deliverable)
    {
        ProjectDeliverable::where('project_id',$this->id)->delete();
        for ($i=0; $i < count($deliverable_project); $i++) { 
            $sema = 0;
            if (in_array($deliverable_project[$i], $deliverable)) {
                $sema = 1;
            }
            ProjectDeliverable::create([
                'project_id' => $this->id,
                'deliverable_id' => $deliverable_project[$i],
                'state' => $sema,
            ]);
        }
    }

    public function percentageProject(){
        $total = 0;
        $hours = 0;
        if ($this->start_date && $this->start_time && $this->end_date && $this->end_time){
            if (now() >= $this->start_date.' '.$this->start_time) {
                $date1 = new DateTime($this->start_date." ".$this->start_time);
                $date2 = new DateTime($this->end_date." ".$this->end_time);
                $diff = $date1->diff($date2);

                $hours = ($diff->d * 8)+$diff->h+(($diff->i / 60));
                $hours2 = $hours;
                $total_days = $hours / 8;
                
                if(date('H') < 16 && date('H') > 8){
                    $date2 = new DateTime('now');
                }else{
                    $date2 = new DateTime(date('Y-m-d 16:00'));
                }
                
                $diff = $date1->diff($date2);

                $hours = ($diff->d * 8)+$diff->h+(($diff->i / 60));
                
                $progress = $hours / 8;
                $hours = $hours2;
                $total = round(($progress * 100) / $total_days , 2);
            }
        }
        $this->update(['percentage' => $total]);
        return $total;
    }
}
