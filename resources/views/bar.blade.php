<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div style="text-align: center; font-family: Arial, sans-serif; padding: 20px;">
        <h1>Bar</h1>
        <p>Un bar oscuro e polveroso sembra custodire un indizio. Chiedi di Jameson al barista e ti viene dato un disegno con scritto qualcosa, sembra quasi una sfida...</p>

        <div style="display: flex; justify-content: center; gap: 10px; margin: 20px 0;">
            <img src="{{ asset('documents/draw3.png') }}" alt="draw" style="width: 200px; height: auto; border-radius: 10px;">
        </div>
        <!-- Form di inserimento delle risposte -->
        <form action="{{ route('bar.check') }}" method="POST">
            @csrf
            <label for="field1">Prima bevanda:</label><br>
            <input type="text" name="field1" id="field1" required style="padding: 5px; font-size: 16px; margin: 10px 0;"><br>

            <label for="field2">Seconda bevanda:</label><br>
            <input type="text" name="field2" id="field2" required style="padding: 5px; font-size: 16px; margin: 10px 0;"><br>

            <label for="field3">Terza bevanda:</label><br>
            <input type="text" name="field3" id="field3" required style="padding: 5px; font-size: 16px; margin: 10px 0;"><br>

            <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; font-size: 16px;">
                Conferma
            </button>
        </form>

        @if(session('message'))
            <p style="color: {{ session('message') === 'Le risposte sono errate. Riprova.' ? 'red' : 'green' }}; margin-top: 10px; font-size: 16px;">
                {!! session('message') !!}
            </p>
        @endif

    </div>
</body>
</html>
