<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Demo Upload image with Vue, Laravel, and Laravel Mix</title>
</head>

<body>
    <div id="app" style="display: flex; flex-direction: row; flex: 1;">

        <div style="flex-grow: 1;">
            <!-- Ini pakai base64 -->
            <h1>Base64</h1>
            <Uploader></Uploader>
        </div>

        <div style="flex-grow: 1;">
            <!-- Ini pakai FormData -->
            <h1>FormData</h1>
            <Form-Data-Uploader></Form-Data-Uploader>
        </div>

    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
