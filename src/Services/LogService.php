<?php
/**
 * UserService
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Maxwell Pham <maxwellpham1@gmail.com>
 * @copyright Copyright (c) 2020 Maxwell Pham <maxwellpham1@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */


namespace OpenEMR\Services;

class LogService
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return log from username
     */
    public function getLog($username)
    {
		$sql = "SELECT user, 
					   comments, 
					   date, 
					   event
					   FROM log
					   WHERE groupname='REST' AND user='{$username}'";
		
		$statementResults = sqlStatement($sql, array());

        $results = array();
        while ($row = sqlFetchArray($statementResults)) {
            array_push($results, $row);
        }

        return $results;
    }
	
	public function getLogByDate($username, $startDate, $endDate)
    {
		$sql = "SELECT user, 
					   comments, 
					   date, 
					   event
					   FROM log
					   WHERE groupname='REST' AND user='{$username}' AND date>='{$startDate}' AND date<='{$endDate}'";
		
		$statementResults = sqlStatement($sql, array());

        $results = array();
        while ($row = sqlFetchArray($statementResults)) {
            array_push($results, $row);
        }

        return $results;
    }
}