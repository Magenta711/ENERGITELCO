<style>
    .black {
        background: #000;
        color: #fff;
    }
    .orange {
        background: #ffc000;
    }
    .yellow {
        background: #FFFF00;
    }
    .center {
        text-align: center;
    }
</style>

<table>
    <thead>
        <tr>
            <th class="yellow">DESCRIPCIÓN</th>
            @foreach ($makeups as $makeup)
                @if ($makeup->id != 9 && $makeup->id != 6)
                    <th>{{ $makeup->description }}</th>
                    <th>CANTIDAD</th>
                @endif
            @endforeach
        </tr>
        <tr>
            <td></td>
            @foreach ($makeups as $makeup)
                @if ($makeup->id != 9 && $makeup->id != 6)
                    <th>{{ $makeup->letter }}</th>
                    <th></th>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($cables as $cable)
            @if ($cable->type_makeup == 1 && $cable->is_ovp != 1)
                <tr>
                    <td>{{ $cable->description }}</td>
                    @foreach ($makeups as $makeup)
                        @if ($makeup->id != 6)     
                            @foreach ($makeup->volteos as $volteo)
                                @if ($volteo->cable_id == $cable->id)
                                    <td class="black">{{ $volteo->w }}</td>
                                    <td class="center">{{ $volteo->default }}</td>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </tr>
            @endif
        @endforeach
        @foreach ($cables as $cable)
            @if ($cable->type_makeup == 1 && $cable->is_ovp == 1)
                <tr>
                    <td>{{ $cable->description }}</td>
                    @foreach ($makeups as $makeup)
                        @foreach ($makeup->volteos as $volteo)
                            @if ($volteo->cable_id == $cable->id)
                                <td class="black">{{ $volteo->w }}</td>
                                <td class="orange center">{{ $volteo->default }}</td>
                            @endif
                        @endforeach
                    @endforeach
                </tr>
            @endif
        @endforeach
    </tbody>
    <thead>
        <tr></tr>
        <tr>
            @foreach ($makeups as $makeup)
                @if ($makeup->id == 9)
                    <th class="yellow" colspan="3">{{ $makeup->description }}</th>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($cables as $cable)
            @if ($cable->type_makeup == 2)
                <tr>
                    <td>{{ $cable->description }}</td>
                    @foreach ($makeups as $makeup)
                        @foreach ($makeup->volteos as $volteo)
                            @if ($volteo->cable_id == $cable->id)
                                <td class="black">{{ $volteo->w }}</td>
                                <td class="center">{{ $volteo->default }}</td>
                            @endif
                        @endforeach
                    @endforeach
                </tr>
            @endif
        @endforeach
    </tbody>
    <thead>
        <tr></tr>
        <tr>
            <th class="yellow" colspan="{{ (count($makeups)*2) + 1 }}">Antena</th>
        </tr>
        <tr>
            <th>DESCRIPCIÓN</th>
            @foreach ($makeups as $makeup)
                @if ($makeup->id != 9 && $makeup->id != 6)
                    <th>{{ $makeup->description }}</th>
                    <th>CANTIDAD</th>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($cables as $cable)
            @if ($cable->type_makeup == 3)
                <tr>
                    <td>{{ $cable->description }}</td>
                    @foreach ($makeups as $makeup)
                        @foreach ($makeup->volteos as $volteo)
                            @if ($volteo->cable_id == $cable->id)
                                <td>{{ $volteo->w }}</td>
                                <td class="center">{{ $volteo->default }}</td>
                            @endif
                        @endforeach
                    @endforeach
                </tr>
            @endif
        @endforeach
    </tbody>
</table>