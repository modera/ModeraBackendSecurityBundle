<?php

namespace Modera\BackendSecurityBundle\DataMapper;

use Modera\ServerCrudBundle\DataMapping\DefaultDataMapper;

/**
 * @author    Alex Plaksin <alex.plaksin@modera.net>
 * @copyright 2016 Modera Foundation
 */
class UserDataMapper extends DefaultDataMapper
{
    /**
     * @var array
     */
    protected $excludedFields = array('meta');

    protected function getAllowedFields($entityClass)
    {
        $me = $this;

        return array_filter(
            parent::getAllowedFields($entityClass),
            function ($fieldName) use ($me) {
                if (array_search($fieldName, $me->excludedFields) !== false) {
                    return false;
                }

                return true;
            }
        );
    }

    public function mapData(array $params, $entity)
    {
        parent::mapData($params, $entity);

        if (array_key_exists('meta', $params)) {
            if (is_array($params['meta'])) {
                $entity->setMeta($params['meta']);
            } else {
                $entity->clearMeta();
            }
        }
    }
}
