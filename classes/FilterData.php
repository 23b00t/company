<?php

/**
 * Class FilterData
 *
 * Extract POST requestData and match it against predefined attributes
 */
class FilterData
{
    private array $requestData;

    /**
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
    }

    /**
     * filter
     *
     * @return array
     */
    public function filter(): array
    {
        $area = $this->requestData['area'];

        // Define attribute arrays for different areas
        $attributesMap = [
            'employee' => ['firstName', 'lastName', 'gender', 'salary'],
            'car' => ['licensePlate', 'manufacturer', 'type'],
            'rental' => ['employeeId', 'carId', 'rentalFrom', 'rentalTo']
        ];

        // Check if area exists in the attributes map
        if (!isset($attributesMap[$area])) {
            return []; // Return empty if no matching area is found
        }

        $areaAttributes = $attributesMap[$area];

        $sanitizedData = [];
        foreach ($areaAttributes as $attribute) {
            $sanitizedData[$attribute] = $this->requestData[$attribute];
        }

        // If no requestData matches an empty array is returned
        return $sanitizedData;
    }
}
