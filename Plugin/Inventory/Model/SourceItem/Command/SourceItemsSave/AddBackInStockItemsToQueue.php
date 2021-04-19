<?php

namespace MageSuite\BackInStock\Plugin\Inventory\Model\SourceItem\Command\SourceItemsSave;

class AddBackInStockItemsToQueue
{
    /**
     * @var \MageSuite\BackInStock\Helper\Configuration
     */
    protected $configuration;

    /**
     * @var \MageSuite\BackInStock\Model\Command\AddBackInStockItemsToQueue
     */
    protected $addBackInStockItemsToQueue;

    public function __construct(
        \MageSuite\BackInStock\Helper\Configuration $configuration,
        \MageSuite\BackInStock\Model\Command\AddBackInStockItemsToQueue $addBackInStockItemsToQueue
    ) {
        $this->configuration = $configuration;
        $this->addBackInStockItemsToQueue = $addBackInStockItemsToQueue;
    }

    public function beforeExecute(\Magento\Inventory\Model\SourceItem\Command\SourceItemsSave $subject, $sourceItems)
    {
        if (!$this->configuration->isModuleEnabled()) {
            return [$sourceItems];
        }

        $this->addBackInStockItemsToQueue->execute($sourceItems);

        return [$sourceItems];
    }
}
