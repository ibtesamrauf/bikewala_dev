<?
function escape_sql($str)
{
    if (get_magic_quotes_gpc())
		$str = stripslashes($str);

	if (!is_numeric($str))
		$str = "'" . mysql_real_escape_string($str) . "'";

	return $str;
}
?>