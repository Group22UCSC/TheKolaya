<?php
$starPrecentage = [
    '1_star' => $data['1_star'] * 100 / $data1,
    '2_star' => $data['2_star'] * 100 / $data1,
    '3_star' => $data['3_star'] * 100 / $data1,
    '4_star' => $data['4_star'] * 100 / $data1,
    '5_star' => $data['5_star'] * 100 / $data1,
];
?>
<div id="get_tea_rate">
    <div class="rating-row">
        <div class="tea-rate-row">
            <div class="side">
                <div>5 stars</div>
            </div>
            <div class="rate-middle">
                <div class="bar-container">
                    <div class="bar-5" style="width: <?php echo $starPrecentage['5_star']; ?>%"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo $data['5_star'] ?></div>
            </div>
        </div>
        <div class="tea-rate-row">
            <div class="side">
                <div>4 stars</div>
            </div>
            <div class="rate-middle">
                <div class="bar-container">
                    <div class="bar-4" style="width: <?php echo $starPrecentage['4_star']; ?>%"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo $data['4_star'] ?></div>
            </div>
        </div>
        <div class="tea-rate-row">
            <div class="side">
                <div>3 stars</div>
            </div>
            <div class="rate-middle">
                <div class="bar-container">
                    <div class="bar-3" style="width: <?php echo $starPrecentage['3_star']; ?>%"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo $data['3_star'] ?></div>
            </div>
        </div>
        <div class="tea-rate-row">
            <div class="side">
                <div>2 stars</div>
            </div>
            <div class="rate-middle">
                <div class="bar-container">
                    <div class="bar-2" style="width: <?php echo $starPrecentage['2_star']; ?>%"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo $data['2_star'] ?></div>
            </div>
        </div>
        <div class="tea-rate-row">
            <div class="side">
                <div>1 star</div>
            </div>
            <div class="rate-middle">
                <div class="bar-container">
                    <div class="bar-1" style="width: <?php echo $starPrecentage['1_star']; ?>%"></div>
                </div>
            </div>
            <div class="side right">
                <div><?php echo $data['1_star'] ?></div>
            </div>
        </div>
    </div>
</div>