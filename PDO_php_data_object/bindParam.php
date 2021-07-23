<?php
/*
pass data type in bindParam() function

PDO::PARAM_INT
PDO::PARAM_STR (string)
PDO::PARAM_LOB (long valuer jono nita hoi)
PDO::PARAM_BOOL
PDO::RARAM_NULL
 */
$sql->bindParam(1, $id, PDO::PARAM_INT);
