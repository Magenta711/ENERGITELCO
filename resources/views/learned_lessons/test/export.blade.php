<table>
    <tr>
        <td colspan="8">Lecciones aprendidas</td>
    </tr>
    <tr>
        <td>Id</td>
        <td>Pregunta</td>
        <td>Total</td>
        <td>Total respondidas</td>
        <td>Total sin respondidas</td>
        <td>Total buenas</td>
        <td>Total malas</td>
        <td>Promedio buenas</td>
        <td>Promedio malas</td>
    </tr>
    @foreach ($arrTests as $item)
        <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['question']}}</td>
            <td>{{$item['total']}}</td>
            <td>{{$item['total_ass']}}</td>
            <td>{{$item['total_anass']}}</td>
            <td>{{$item['total_good']}}</td>
            <td>{{$item['total_bad']}}</td>
            <td>{{$item['pormedio_good']}}</td>
            <td>{{$item['pormedio_bad']}}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
    </tr>
    <tr>
        <td>Cedula</td>
        <td>Nombre</td>
        <td>Total</td>
        <td>Total respondidas</td>
        <td>Total sin respondidas</td>
        <td>Total buenas</td>
        <td>Total malas</td>
        <td>Promedio buenas</td>
        <td>Promedio malas</td>
    </tr>
    @foreach ($arrUsers as $item)
        <tr>
            <td>{{$item['cedula']}}</td>
            <td>{{$item['name']}}</td>
            <td>{{$item['total']}}</td>
            <td>{{$item['total_ass']}}</td>
            <td>{{$item['total_anass']}}</td>
            <td>{{$item['total_good']}}</td>
            <td>{{$item['total_bad']}}</td>
            <td>{{$item['pormedio_good']}}</td>
            <td>{{$item['pormedio_bad']}}</td>
        </tr>
    @endforeach
</table>