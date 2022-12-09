<?php


namespace App\Domain\TechnicalInfo\Getters;

class GetFilePathFromKey
{

    private $key;

    public function setKey(string $key): self
    {
        $this->key = $key;
        return $this;
    }

    public function get() {

        $prefix = 'SecuredDocs/';

        $map = [
            'npa' => 'Literature Page/NPA',
            'spec_sheet' => 'Literature Page/Spec Sheet',
            'owners_guide' => 'Literature Page/Owners Guide',
            'installation_manual' => 'Literature Page/Installation Manual',
            'parts_list' => 'Literature Page/Parts List',
            'certification' => 'Literature Page/Certification',
            'field_manual' => 'Literature Page/Field Manual',
            'service_manual' => 'Literature Page/Service Manual',
            'service_manual_hot_water_capabilities' => 'Literature Page/Service Manual',
            'service_manual_pressure_loss_chart' => 'Literature Page/Service Manual',
            'service_manual_components' => 'Literature Page/Service Manual',
            'service_manual_operating_principal' => 'Literature Page/Service Manual',
            'service_manual_operation_flow' => 'Literature Page/Service Manual',
            'service_manual_wiring_diagram' => 'Literature Page/Service Manual',
            'service_manual_error_code_and_checkpoints' => 'Literature Page/Service Manual',
            'service_manual_circuit_board_checkpoints' => 'Literature Page/Service Manual',
            'service_manual_error_descriptions' => 'Literature Page/Service Manual',
            'service_manual_maintenance' => 'Literature Page/Service Manual',
            'service_manual_circuit_board_replacement' => 'Literature Page/Service Manual',
            'service_manual_fan_motor_calibration' => 'Literature Page/Service Manual',
            'service_manual_neutralizer_replacement' => 'Literature Page/Service Manual',
            'service_manual_manifold_pressures' => 'Literature Page/Service Manual',
            'service_manual_change_default_temperatures' => 'Literature Page/Service Manual',
            'service_manual_condensate_drain_line' => 'Literature Page/Service Manual',
        ];

        if (isset($map[$this->key])) {

            return $prefix . $map[$this->key] . '/';
        }

        return $prefix;
    }
}
