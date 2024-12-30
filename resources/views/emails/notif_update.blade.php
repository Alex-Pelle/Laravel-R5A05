<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title></title>

</head>
<body>

<div class="py-4">

        <div class="container">
            <h1>Mise à jour de la note</h1>
            <p>Bonjour {{ $noteDetails['eleve'] }},</p>
            <p>La note de l'examen  {{ $noteDetails['examen'] }} en {{ $noteDetails['module'] }} a été mise à jour:</p>
            <ul>
                <li><strong>Note :</strong> {{ $noteDetails['note'] }}/20</li>
                <li><strong>Date :</strong> {{ $noteDetails['date'] }}</li>
            </ul>
            <p>Merci,</p>
            <p>L'équipe {{ config('app.name') }}</p>

        </div>

</div>
</body>
</html>



