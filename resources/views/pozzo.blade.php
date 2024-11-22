<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Old</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div style="text-align: center; font-family: Arial, sans-serif; padding: 20px;">
        <h1>The Old</h1>
        <p>Questo pozzo è testimone di molti segreti, ma ne svelerà uno solo a chi versa il giusto tributo. Trova la quantità esatta di sangue che si deve versare per risvegliare la verità. Leggi tra le righe del pozzo o fatti leggere il numero che cerchi:</p>

        <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin: 20px 0;">
            <img src="{{ asset('documents/well1.png') }}" alt="Dal primo giorno che guardo, fino al settimo che chiudo,
la somma di ciò che cresce rivela il giusto peso." style="width: 150px; height: auto; border-radius: 10px;">
            <img src="{{ asset('documents/well2.png') }}" alt="Jameson?" style="width: 150px; height: auto; border-radius: 10px;">
        </div>
        <!-- Form di inserimento codice -->
        <form action="{{ route('pozzo.check') }}" method="POST">
            @csrf
            <label for="blood">Inserisci gli Ml di sangue da versare:</label><br>
            <input type="text" name="blood" id="blood" required style="padding: 5px; font-size: 16px; margin: 10px 0;">
            <button type="submit" style="padding: 10px 20px; background-color: #eb1717; color: white; border: none; border-radius: 5px; font-size: 16px;">
                Conferma
            </button>
        </form>

        @if(session('message'))
            <p style="color: {{ session('message') === 'Ti stai solo dissanguando. Riprova.' ? 'red' : 'green' }}; margin-top: 10px; font-size: 16px;">
                {!! session('message') !!}
            </p>
        @endif
    </div>
</body>
</html>
