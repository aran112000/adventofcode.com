<?php
// WORK IN PROGRESS!!!

//$input = '11 11 13 7 0 15 5 5 4 4 1 1 7 1 15 11';
$input = '0 2 7 0';
$blocks = explode(" ", $input);
$num_blocks = count($blocks);
$seen_patterns = [$blocks];
$redistributions = 0;

while (1) {
    $key = get_highest_key($blocks);
    $highest_block = $blocks[$key];

    $blocks[$key] = 0;
    for ($i = 0; $i < $highest_block; $i++) {
        $current_key = $i + $key;
        if ($current_key >= ($num_blocks - 1)) {
            $current_key -= $num_blocks;
        }

        $blocks[$current_key]++;
    }

    $redistributions++;

    echo 'Redistributions: ' . $redistributions . PHP_EOL;
    echo 'Current: ' . implode("\t", $blocks) . PHP_EOL . PHP_EOL;

    if (!in_array($blocks, $seen_patterns)) {
        break;
    }
    $seen_patterns[] = $blocks;
}

echo $redistributions;

function get_highest_key($blocks) {
    return array_keys($blocks, max($blocks))[0];
}
?>
