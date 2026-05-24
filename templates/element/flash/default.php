<?php
$type = $params['class'] ?? 'success';

$bg = 'linear-gradient(135deg,#00ffcc,#00c3ff)';
$icon = 'fa-check-circle';

if ($type === 'error') {
    $bg = 'linear-gradient(135deg,#ff416c,#ff4b2b)';
    $icon = 'fa-times-circle';
}
?>

<div class="toast-msg" style="background: <?= $bg ?>">
    <i class="fa <?= $icon ?> me-2"></i>
    <?= h($message) ?>
</div>