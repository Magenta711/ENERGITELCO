@component('mail::message')
# Mensaje por medio formulario Contáctanos de pagina informativa
{!!str_replace("\n", '</br>', addslashes($data['text']))!!}

@component('mail::table')
| Detalles |
|:-------------:|
| <b>Nombre</b> <br> {{$data['name']}} |
| <b>Email</b> <br> {{ $data['email'] }} |
| <b>IP</b> <br> {{ $ip }} |
| <b>Fecha</b> <br> {{ now()->format('d-m-Y H:i:s') }} |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent