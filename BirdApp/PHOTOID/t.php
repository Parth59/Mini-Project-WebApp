<?php 

$command = escapeshellcmd('ls -l');
$output = shell_exec($command);
echo $output;
?>
