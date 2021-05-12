@php
    $con = 0;
@endphp
<tr id="tr_{{$time_planning->id}}">
    <td id="tdName_{{$time_planning->id}}">
        {{$time_planning->project_activity_id}} {{$time_planning->activity->description}}
    </td>
    <td id="tdAmount_{{$time_planning->id}}">
        <input type="number" name="amount[]" class="form-control" id="inputAmount_{{$time_planning->id}}" value="{{$time_planning->amount}}" placeholder="Cantidad">
    </td>
    <td id="tdDays_{{$time_planning->id}}">
        @foreach ($time_planning->activity->PaymentLimit as $limit)
            <label style="display: block;" for="time_{{$time_planning->activity->id}}_{{$limit->id}}" class="labelCheckTime_{{$time_planning->activity->id}}">
                <input type="checkbox" name="time[]" id="time_{{$limit->id}}_{{$time_planning->activity->id}}" value="{{$limit->id}}" class="value_{{$time_planning->activity->hasTime($limit->id)}} checkTime_{{$time_planning->id}}" @foreach ($time_planning->time as $time) @if ($time->time_id == $limit->id) @php
                    $con++;
                @endphp checked @endif @endforeach >
                {{$time_planning->activity->hasTime($limit->id)}} día(s) {{$limit->description_time}}
            </label>
        @endforeach
    </td>
    <td id="tdTotalDays_{{$time_planning->id}}" class="text-right totalDays">{{$time_planning->total_days}}</td>
    <td id="tdComentaries_{{$time_planning->id}}"><input type="text" name="comentaries[]" class='form-control' id="inputComentary_{{ $time_planning->id }}" value="{{$time_planning->comentaries}}"></td>
    <td id="tdActions_{{$time_planning->id}}">
        <span class="fa fa-trash-o" id="removeItem_{{$time_planning->id}}"></span>
        <input type="hidden" id="inputIdItem_{{$time_planning->id}}" name="id_item[]" value="{{$time_planning->id}}">
        <input type="hidden" id="inputTotalDays_{{$time_planning->id}}" name="total_days[]" value="{{$time_planning->total_days}}">
        <input type="hidden" id="inputTotalCheckDays_{{$time_planning->id}}" name="total_check_days[]" value="{{$con}}">
        <input type="hidden" id="inputPhaseItem_{{$time_planning->id}}" name="phase_item[]" value="{{$time_planning->phase_item}}">
    </td>
</tr>