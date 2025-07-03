<!DOCTYPE html>
<html>
<head>
    <title>Test URL en correo</title>
</head>
<body>
    <h1>Prueba de URL generada en correo</h1>

    <p><strong>APP_URL desde config:</strong></p>
    <p>{{ config('app.url') }}</p>

    <p><strong>Link generado manualmente:</strong></p>
    <p>{{ config('app.url') }}/finances/payroll_overtime_news_report/export</p>

    <p><strong>Link generado con helper url():</strong></p>
    <p>{{ url('finances/payroll_overtime_news_report/export') }}</p>
</body>
</html>
