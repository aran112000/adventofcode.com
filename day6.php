<?php
$input = '11 11 13 7 0 15 5 5 4 4 1 1 7 1 15 11';
$blocks = explode(" ", $input);
$num_blocks = count($blocks);
$seen_patterns = [$blocks];
$redistributions = 0;

while (true) {
    $redistributions++;
    $highest_key = array_keys($blocks, max($blocks))[0];
    $highest_value = $blocks[$highest_key];
    $blocks[$highest_key] = 0; // Set current to zero before redistribution

    for ($i = 1; $i <= $highest_value; $i++) {
        $current_key = ($i + $highest_key) % $num_blocks;
        $blocks[$current_key]++;
    }
    if (in_array($blocks, $seen_patterns)) break;
    $seen_patterns[] = $blocks;
}

echo 'Part 1: ' . $redistributions . PHP_EOL;
echo 'Part 2: ' . (count($seen_patterns) - array_keys($seen_patterns, $blocks)[0]);
