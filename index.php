<?php


function a() {
	for ($i = 0; $i < 9; $i++) {
		yield $i;
	}
}

foreach (a() as $value) {
	echo $value;
}

echo "alon";

