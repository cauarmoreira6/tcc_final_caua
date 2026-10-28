<?php
require_once dirname(__DIR__) . '/config.php';
?>
<script>window.BASE_URL = <?= json_encode(BASE_URL, JSON_UNESCAPED_SLASHES) ?>;</script>

<a class="skip-link" href="#main-content">Pular para o conteúdo principal</a>

<details class="accessibility-tools">
    <summary>Opções de acessibilidade</summary>
    <div class="accessibility-tools-panel" role="group" aria-label="Opções de acessibilidade">
        <button type="button" id="textSizeToggle" aria-pressed="false">Aumentar texto</button>
        <button type="button" id="contrastToggle" aria-pressed="false">Alto contraste</button>
        <button type="button" id="readPageToggle" aria-pressed="false">Ouvir esta página</button>
        <button type="button" id="stopReading" disabled>Parar leitura</button>
        <p class="accessibility-help">
            A leitura usa a voz disponível no seu navegador. Se ela não estiver disponível,
            use o leitor de tela do seu dispositivo.
        </p>
        <p id="accessibilityStatus" class="visually-hidden" role="status" aria-live="polite"></p>
    </div>
</details>

<script src="<?= BASE_URL ?>/js/accessibility.js" defer></script>
