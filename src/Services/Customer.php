<?php

namespace BoldApps\ShopifyToolkit\Services;

use BoldApps\ShopifyToolkit\Models\Customer as ShopifyCustomer;
use Illuminate\Support\Collection;

/**
 * Class Customer.
 */
class Customer extends CollectionEntity
{
    /**
     * @param $id
     *
     * @return ShopifyCustomer|object
     */
    public function getById($id)
    {
        $raw = $this->client->get("admin/customers/$id.json");

        return $this->unserializeModel($raw['customer'], ShopifyCustomer::class);
    }

    /**
     * @param int   $page
     * @param int   $limit
     * @param array $filter
     *
     * @return Collection
     */
    public function getAll($page = 1, $limit = 50, $filter = [])
    {
        $raw = $this->client->get('admin/customers.json', array_merge(['page' => $page, 'limit' => $limit], $filter));

        $customers = array_map(function ($product) {
            return $this->unserializeModel($product, ShopifyCustomer::class);
        }, $raw['customers']);

        return new Collection($customers);
    }

    /**
     * @param array $parms
     *
     * @return Collection
     */
    public function getByParams($parms)
    {
        $raw = $this->client->get('admin/customers.json', $parms);

        $customers = array_map(function ($customer) {
            return $this->unserializeModel($customer, ShopifyCustomer::class);
        }, $raw['customers']);

        return new Collection($customers);
    }

    /**
     * @param array $parms
     * @return Collection
     */
    public function searchByParams($parms)
    {
        $raw = $this->client->get('admin/customers/search.json', $parms);

        $customers = array_map(function ($customer) {
            return $this->unserializeModel($customer, ShopifyCustomer::class);
        }, $raw['customers']);

        return new Collection($customers);
    }

    /**
     * @param array $filter
     *
     * @return int
     */
    public function count($filter = [])
    {
        $raw = $this->client->get('admin/customers/count.json', $filter);

        return $raw['count'];
    }

    /**
     * @param $filter
     *
     * @return int
     */
    public function countByParams($filter = [])
    {
        $raw = $this->client->get('admin/customers/count.json', $filter);

        return $raw['count'];
    }

    /**
     * @param ShopifyCustomer $customer
     *
     * @return ShopifyCustomer | object
     */
    public function create(ShopifyCustomer $customer)
    {
        $serializedModel = ['customer' => array_merge($this->serializeModel($customer))];

        $raw = $this->client->post('admin/customers.json', [], $serializedModel);

        return $this->unserializeModel($raw['customer'], ShopifyCustomer::class);
    }

    /**
     * @param ShopifyCustomer $customer
     *
     * @return ShopifyCustomer | object
     */
    public function update(ShopifyCustomer $customer)
    {
        $serializedModel = ['customer' => $this->serializeModel($customer)];

        $raw = $this->client->put("admin/customers/{$customer->getId()}.json", [], $serializedModel);

        return $this->unserializeModel($raw['customer'], ShopifyCustomer::class);
    }

    /**
     * @param ShopifyCustomer $customer
     *
     * @return ShopifyCustomer | object
     */
    public function delete(ShopifyCustomer $customer)
    {
        return $this->client->delete("admin/customers/{$customer->getId()}.json");
    }

    /**
     * @param int $shopCustomerId
     * @return array
     */
    public function sendAccountCreationInvite(int $shopCustomerId) {
        return $this->client->post("admin/customers/{$shopCustomerId}/send_invite.json", [], []);
    }
}
