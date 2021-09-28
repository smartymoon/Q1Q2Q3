<?php
// method one
class Monopoly {

    private int $ways = 0;

    public function play($leftDistance) {
        if ($leftDistance === 0) {
            $this->ways++;
        } else {
            for ($i = 1; $i <= min(6, $leftDistance); $i++) {
                $this->play($leftDistance - $i);
            }
        }
    }

    public function getWays()
    {
        return $this->ways;
    }
}


// method two
function play($total) {
    // assume we move forward 1 space at first
    $state = [
        1 => 1,
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0,
        6 => 0,
    ];

    // move 1 more space
    for ($space = 2; $space <= $total; $space++) {
        if ($space < 7) {
            for ($mark = $space - 1; $mark > 0; $mark-- ) {
                $state[$space] += $state[$mark];
            }
            $state[$space] += 1;
        } else {
            $newTotal = array_sum($state);
            $state[1] = $state[2];
            $state[2] = $state[3];
            $state[3] = $state[4];
            $state[4] = $state[5];
            $state[5] = $state[6];
            $state[6] = $newTotal;
        }
    }
    if ($total < 7) {
        return $state[$total];
    } else {
        return $state[6];
    }
}

for ($i=1;$i<15;$i++) {
    print_r('when destination is ' . $i . "\n");
    $board = new Monopoly;
    $board->play($i);
    print_r('by method one, we got '.  $board->getWays() . "\n");
    print_r('by method two, we got '.  play($i) . "\n");
    print_r("--------------\n");
}
