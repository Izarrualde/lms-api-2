<?php
namespace Lms\V1\Rest\UserGroups;

class UserGroupsResourceFactory
{
    public function __invoke($services)
    {
        return new UserGroupsResource();
    }
}
