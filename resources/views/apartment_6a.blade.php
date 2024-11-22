<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appartamento 6A</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div style="text-align: center; font-family: Arial, sans-serif; padding: 20px;">
        <!-- Titolo -->
        <h1>Appartamento 6A</h1>

        <!-- Descrizione -->
        <p style="font-size: 18px; margin: 20px 0; line-height: 1.6;">
            L'appartamento del detective Jameson rifletteva perfettamente la sua personalità: rigorosa, efficiente e implacabile.
        </p>

        <p style="font-size: 16px; margin: 20px 100px; line-height: 1.6;">
            Sulle pareti erano scritti quattro numeri, mentre sotto il tavolo rovesciato giaceva un biglietto con la scritta: *"La chiave è nel sole"*.  
            <br>
            Sotto il letto, che sembrava non essere mai stato usato, c'era una cassaforte chiusa da un codice a quattro cifre.
        </p>

        <!-- Immagini delle pareti -->
        <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin: 20px 0;">
            <img src="{{ asset('documents/west.png') }}" alt="West" style="width: 150px; height: auto; border-radius: 10px;">
            <img src="{{ asset('documents/south.png') }}" alt="South" style="width: 150px; height: auto; border-radius: 10px;">
            <img src="{{ asset('documents/north.png') }}" alt="North" style="width: 150px; height: auto; border-radius: 10px;">
            <img src="{{ asset('documents/east.png') }}" alt="East" style="width: 150px; height: auto; border-radius: 10px;">
        </div>

        <!-- Campo per la cassaforte -->
        <form action="{{ route('apartment.check') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <label for="safe_code" style="font-size: 16px;">Inserisci il codice della cassaforte:</label><br>
            <input type="text" name="safe_code" id="safe_code" maxlength="4" required style="padding: 5px; font-size: 16px; margin: 10px 0;">
            <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; font-size: 16px;">
                Sblocca
            </button>
        </form>

        <!-- Messaggio di errore o successo -->
        @if(session('message'))
            <p style="color: red; margin-top: 10px; font-size: 16px;">{{ session('message') }}</p>
        @endif
    </div>
</body>
</html>
