<?php

\Magento\TestFramework\Helper\Bootstrap::getInstance()->reinitialize();

/** @var \Magento\TestFramework\ObjectManager $objectManager */
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

/** @var \Magento\Catalog\Api\ProductRepositoryInterface $productRepository */
$productRepository = $objectManager->create(\Magento\Catalog\Api\ProductRepositoryInterface::class);

/** @var \MageSuite\BackInStock\Api\BackInStockSubscriptionRepositoryInterface $backInStockSubscriptionRepository */
$backInStockSubscriptionRepository = $objectManager->create(\MageSuite\BackInStock\Api\BackInStockSubscriptionRepositoryInterface::class);
$productSkus = ['simple_1', 'simple_2', 'simple_3'];

foreach ($productSkus as $sku) {
    $product = $productRepository->get($sku);
    if ($sku === 'simple_2') {
        continue;
    }

    for ($i = 0; $i < 10; $i++) {
        $token = $backInStockSubscriptionRepository->generateToken('test+'.$i.'@test.com', '0');
    /** @var \MageSuite\BackInStock\Model\BackInStockSubscription $backInStockSubscription */
        $backInStockSubscription = $objectManager->create(\MageSuite\BackInStock\Model\BackInStockSubscription::class);

        $backInStockSubscription
        ->setProductId($product->getId())
        ->setStoreId(1)
        ->setCustomerId(0)
        ->setCustomerEmail('test+'.$i.'@test.com')
        ->setToken($token);

        $backInStockSubscriptionRepository->save($backInStockSubscription);
    }
}
