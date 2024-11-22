<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Woodtel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div style="text-align: center; font-family: Arial, sans-serif; padding: 20px;">
        <!-- Titolo dell'Hotel -->
        <h1>Woodtel</h1>

        <!-- Descrizione dell'Hotel -->
        <p style="font-size: 18px; margin: 20px 0; line-height: 1.6;">
            Benvenuto al leggendario <strong>Hotel Ravenswood</strong>, dove il passato si intreccia con il presente in un'atmosfera carica di mistero e fascino. 
            <br>
            Questo luogo maestoso, con la sua facciata imponente e interni lussuosi, racconta storie di tempi remoti, quando il potere e la ricchezza ne segnavano ogni dettaglio.  
<br>
            Entrando nel foyer, sarai avvolto da un'eleganza senza tempo: pareti adornate con opere d'arte antiche, scale coperte da morbida seta nera e pavimenti in marmo che riflettono la luce soffusa di lampadari scintillanti.  
        </p>

        <!-- Immagini -->
        <div style="display: flex; justify-content: center; gap: 10px; margin: 20px 0;">
            <img src="{{ asset('documents/hotel1.png') }}" alt="Foyer Hotel" style="width: 200px; height: auto; border-radius: 10px;">
            <img src="{{ asset('documents/hotel2.png') }}" alt="Hall Hotel" style="width: 200px; height: auto; border-radius: 10px;">
            <img src="{{ asset('documents/hotel3.png') }}" alt="Camera Hotel" style="width: 200px; height: auto; border-radius: 10px;">
        </div>

        <!-- Form di inserimento appartamento -->
        <form action="{{ route('hotel.check') }}" method="POST">
            @csrf
            <label for="apartment">Inserisci il numero dell'appartamento:</label><br>
            <input type="text" name="apartment" id="apartment" required>
            <button type="submit">Cerca</button>
        </form>

        @if(session('error'))
            <p style="color: red; margin-top: 10px;">{{ session('error') }}</p>
        @endif
    </div>
</body>
</html>
