<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Réservation Approuvée</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <h1 style="color: #5cb85c;">Réservation Approuvée</h1>
        <p>Bonjour {{ $reservation->user->name }},</p>
        <p>Votre réservation pour le livre <strong>"{{ $reservation->livre->nomlivre }}"</strong> a été approuvée.</p>
        <p><strong>Du :</strong> {{ $reservation->date_debut }}</p>
        <p><strong>Au :</strong> {{ $reservation->date_fin }}</p>
        <p style="color: #777;">Nous vous souhaitons une bonne lecture !</p>
        <p style="margin-top: 20px;">Cordialement,<br>Équipe de la Bibliothèque Électronique</p>
    </div>
</body>
</html>
