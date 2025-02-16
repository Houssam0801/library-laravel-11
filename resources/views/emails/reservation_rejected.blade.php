<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Réservation Refusée</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <h1 style="color: #d9534f;">Réservation Refusée</h1>
        <p>Bonjour {{ $reservation->user->name }},</p>
        <p>Nous regrettons de vous informer que votre réservation pour le livre <strong>"{{ $reservation->livre->nomlivre }}"</strong> a été refusée.</p>
        <p style="color: #777;">Si vous avez des questions, n'hésitez pas à nous contacter.</p>
        <p style="margin-top: 20px;">Cordialement,<br>Équipe de la Bibliothèque Électronique</p>
    </div>
</body>
</html>
