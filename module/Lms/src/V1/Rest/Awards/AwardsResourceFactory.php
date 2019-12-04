<?php
namespace Lms\V1\Rest\Awards;

class AwardsResourceFactory
{
    public function __invoke($services)
    {
        return new AwardsResource();
    }
}
