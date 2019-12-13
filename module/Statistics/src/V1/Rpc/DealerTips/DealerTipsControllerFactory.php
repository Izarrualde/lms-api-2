<?php
namespace Statistics\V1\Rpc\DealerTips;

class DealerTipsControllerFactory
{
    public function __invoke($controllers)
    {
        return new DealerTipsController();
    }
}
