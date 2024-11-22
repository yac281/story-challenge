<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woods</title>
    <!-- Bootstrap CSS (facoltativo) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div style="text-align: center; font-family: Arial, sans-serif; padding: 20px;">
        <h1>Woods</h1>
        <button class="btn btn-primary mt-3 mb-5" data-bs-toggle="modal" data-bs-target="#documentModal">Vedi Documenti</button>

        <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Questi sono gli indizi trovati fuori dai woods</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Seleziona uno degli indizi da visualizzare:</p>
                        <div class="d-grid gap-2">
                            <a href="{{ asset('documents/JAMESON.pdf') }}" target="_blank" class="btn btn-primary">Pezzo di Carta scritto da JAMESON</a>
                            <a href="{{ asset('documents/formula.pdf') }}" target="_blank" class="btn btn-primary">Formula presa dal Tomo dato da Hannah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form di inserimento risposte -->
        <form action="{{ route('woods.check') }}" method="POST">
            @csrf
            <label for="formula">Formula Finale:</label><br>
            <input type="text" name="formula" id="formula" required style="padding: 5px; font-size: 16px; margin: 10px 0;"><br>

            <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; font-size: 16px;">
                Conferma
            </button>
        </form>

        @if(session('message'))
            <p style="color: {{ session('message') === 'Formula errata. Riprova.' ? 'red' : 'green' }}; margin-top: 10px; font-size: 16px;">
                {{ session('message') }}
            </p>
        @endif
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
