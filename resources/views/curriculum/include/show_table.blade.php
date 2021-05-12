<tr>
    @php
    $hasFile = 0;
    @endphp
    <td class="td-item">{{$num}}</td>
    <td class="td-description">{{$label}}</strong></td>
    <td>
        @foreach ($id->files as $item)
            @if ($item->description == $label && !$hasFile)
                @php
                    $hasFile = 1;
                @endphp
                Si
            @endif
        @endforeach
        @if (!$hasFile)
            No
        @endif
    </td>
</tr>