<?php
$time_start = microtime(true);
ini_set('max_execution_time',60);
$num =50000;
for( $j = 10001; $j <= $num; $j++ ){	
	for( $k = 2; $k <= $j; $k++ ){
		if( $j % $k == 0 ){
			echo "<div width=800>";
			if( $j == $k )
			echo $j, "<br>";
			break;			
		}
	}	
}
$time_end = microtime(true);
$time = $time_end - $time_start;
echo '<Execution time: '.$time.' seconds';
echo '</div>Execution time: '.$time.' seconds';
?>