<?php

namespace MageSuite\BackInStock\Api;

interface BackInStockSubscriptionRepositoryInterface
{
    /**
     * @param int $id
     * @return \MageSuite\BackInStock\Api\Data\BackInStockSubscriptionInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param string|int $productId
     * @param string|int $identifyByField
     * @param string $identifyByValue
     * @param int $storeId
     * @return mixed
     */
    public function get(int $productId, string $identifyByField, $identifyByValue, int $storeId): \MageSuite\BackInStock\Model\BackInStockSubscription; //phpcs:ignore

    /**
     * @param \MageSuite\BackInStock\Api\Data\BackInStockSubscriptionInterface $backInStockSubscription
     * @return \MageSuite\BackInStock\Api\Data\BackInStockSubscriptionInterface
     */
    public function save(\MageSuite\BackInStock\Api\Data\BackInStockSubscriptionInterface $backInStockSubscription);

    /**
     * @param \MageSuite\BackInStock\Api\Data\BackInStockSubscriptionInterface $backInStockSubscription
     * @return void
     */
    public function delete(\MageSuite\BackInStock\Api\Data\BackInStockSubscriptionInterface $backInStockSubscription);

    /**
     * @param string|int $productId
     * @param string|int $identifyByField
     * @param string $identifyByValue
     * @param string $storeId
     * @return mixed
     */
    public function subscriptionExist($productId, $identifyByField, $identifyByValue, $storeId); //phpcs:ignore

    /**
     * @param $email
     * @param $customerId
     * @return mixed
     */
    public function generateToken($email, $customerId);
}
