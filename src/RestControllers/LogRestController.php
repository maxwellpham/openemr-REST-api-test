<?php
/**
 * ListRestController
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Matthew Vita <matthewvita48@gmail.com>
 * @copyright Copyright (c) 2018 Matthew Vita <matthewvita48@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */


namespace OpenEMR\RestControllers;

use OpenEMR\Services\LogService;
use OpenEMR\RestControllers\RestControllerHelper;

use OpenEMR\Common\Logging\EventAuditLogger;

class LogRestController
{
    private $logService;

    public function __construct()
    {
        $this->logService = new LogService();
    }

    public function getLog($username)
    {
        $serviceResult = $this->logService->getLog($username);
		EventAuditLogger::instance()->newEvent('REST-Log-GetLog', 'TESTSTESFEHJKHFL', "REST", 1, "");
        return RestControllerHelper::responseHandler($serviceResult, null, 200);
    }
	
	public function getLogByDate($username, $startDate, $endDate){
		$serviceResult = $this->logService->getLogByDate($username, $startDate, $endDate);
        return RestControllerHelper::responseHandler($serviceResult, null, 200);
	}
}
