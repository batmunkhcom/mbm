<?php

namespace D\Mapper;

class SettingsMapper extends AbstractDataMapper {

    protected $entityTable = "settings";

    protected function loadEntity(array $row) {
        return new \D\Model\Settings(
                array(
            "id" => $row['id'],
            "name" => $row['name'],
            "value" => $row['value'])
        );
    }

}
