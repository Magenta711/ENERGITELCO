<tr>
    @php
    $hasSignature = 0;
    @endphp
    <td class="td-item">{{$num}}</td>
    <td class="td-description">{{$item->name}}</strong></td>
    <td>
        @if ($id->register->user && $id->register->user->signatures)
            @foreach ($id->register->user->signatures as $signature)
                @if ($signature->id == $item->id)
                    @php
                        $hasSignature = 1;
                    @endphp
                    Si
                @endif
            @endforeach
        @endif
        @if (!$hasSignature)
            No
        @endif
    </td>
</tr>