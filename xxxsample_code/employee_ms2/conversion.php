<?php
			function convertDateToSQL(&$input) 
			{
			    /* Convert text date input by user to SQL format, i.e.
				      dd/mm/yyyy  --> yyyy-mm-dd
				*/
			    $day=substr($input,0,2);
				$month=substr($input,3,2);
				$year=substr($input,6,4);
				$input = $year."-".$month."-".$day;
				return;
			}
			
			function convertDateToHTML(&$input)
			{
			    /* Convert SQL date retrieved from database to HTML format. i.e.
				   yyyy-mm-dd  --> dd/mm/yyyy
				*/
				$year=substr($input, 0,4);
				$month=substr($input,5,2);
				$day=substr($input, 8,2);
				$input = $day."/".$month."/".$year;
				return;
			}
?>