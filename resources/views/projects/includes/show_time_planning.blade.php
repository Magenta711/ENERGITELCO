<tr id="tr_{{$time_planning->id}}">
    <td>
        {{$time_planning->project_activity_id}}
    </td>
    <td id="tdName_{{$time_planning->id}}">
        {{$time_planning->activity->description}}
    </td>
    <td id="tdAmount_{{$time_planning->id}}">
        {{$time_planning->amount}}
    </td>
    <td id="tdDays_{{$time_planning->id}}">
        @foreach ($time_planning->activity->PaymentLimit as $limit)
            @foreach ($time_planning->time as $time)
                @if ($time->time_id == $limit->id)
                    {{$time_planning->activity->hasTime($limit->id)}} día(s) {{$limit->description_time}}<br>
                @endif
            @endforeach
        @endforeach
    </td>
    <td id="tdTotalDays_{{$time_planning->id}}" class="text-right totalDays">{{$time_planning->total_days}}</td>
    <td id="tdComentaries_{{$time_planning->id}}">{{$time_planning->comentaries}}</td>
    {{-- <td id="tdActions_{{$time_planning->id}}">
    </td> --}}
</tr>