<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-Unit</title>
    <!-- Bootstrap CSS (facoltativo) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div style="text-align: center; font-family: Arial, sans-serif; padding: 20px;">
        <h1>Caso #1 - Il Villaggio</h1>
        <p style="font-size: 18px;">Svela il mistero attorno al villaggio di RavensWood e trova il Detective Jameson prima che il tempo scada!</p>
        <h2>Tempo rimanente:</h2>
        <div id="countdown" style="font-size: 24px; color: #e74c3c; font-weight: bold;"></div>
        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#documentModal">Vedi Documenti</button>
    </div>

    <!-- Modale -->
    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Questi sono i documenti riguardo il caso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Seleziona uno dei documenti da visualizzare:</p>
                    <div class="d-grid gap-2">
                        <a href="{{ asset('documents/Lettera_Gordon.pdf') }}" target="_blank" class="btn btn-primary">Lettera da Parte di N. H. Gordon</a>
                        <a href="{{ asset('documents/Lettera_Jameson.pdf') }}" target="_blank" class="btn btn-primary">Lettera da Parte di J. Jameson</a>
                        <a href="{{ asset('documents/photo1.png') }}" target="_blank" class="btn btn-primary">Foto del villaggio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="text-center">Classifica</h3>
        <table class="table table-striped table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scores as $index => $score)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $score->name }}</td>
                        <td>{{ $score->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (facoltativo) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const timerEnd = new Date("{{ $timerEnd }}").getTime();
        const countdownElement = document.getElementById('countdown');

        const updateCountdown = () => {
            const now = new Date().getTime();
            const timeLeft = timerEnd - now;

            if (timeLeft <= 0) {
                countdownElement.innerHTML = "Tempo scaduto!";
                clearInterval(interval);
                return;
            }

            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        };

        const interval = setInterval(updateCountdown, 1000);
        updateCountdown();
    });
</script>
</html>
