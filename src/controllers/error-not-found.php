<?php
$params = [
    'pageTitle' => 'Ma boutique en ligne',
    'errorMessage' => 'Ressource non trouvée'
];

echo renderView('view-error', $params);