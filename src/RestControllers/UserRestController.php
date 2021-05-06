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

use OpenEMR\Services\UserService;
use OpenEMR\RestControllers\RestControllerHelper;

use OpenEMR\Common\Logging\EventAuditLogger;
class UserRestController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function getAll()
    {
        $serviceResult = $this->userService->getAll();
        return RestControllerHelper::responseHandler($serviceResult, null, 200);
    }
	
	public function getOne($username)
    {
        $serviceResult = $this->userService->getOne($username);
        return RestControllerHelper::responseHandler($serviceResult, null, 200);
    }
	
	public function getAuthorized($username)
    {
        $serviceResult = $this->userService->getAuthorized($username);
        return RestControllerHelper::responseHandler($serviceResult, null, 200);
    }
}
