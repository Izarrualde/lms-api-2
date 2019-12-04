<?php
namespace Lms\V1\Rest\Expenses;

use Solcre\Lms\Service\PermissionService;
use Solcre\Pokerclub\Service\ExpensesSessionService;

class ExpensesResourceFactory
{
    public function __invoke($services)
    {
        $expensesSessionService = $services->get(ExpensesSessionService::class);
        $permissionService = $services->get(PermissionService::class);

        return new ExpensesResource($expensesSessionService, $permissionService);
    }
}
