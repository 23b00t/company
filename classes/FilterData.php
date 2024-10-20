<?php

/**
 * Class FilterData
 *
 * Extract POST data and match it against predefined attributes
 */
class FilterData
{
    private array $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * filter
     *
     * @return array
     */
    public function filter(): array
    {
        $attributes = [
            'firstName',
            'lastName',
            'gender',
            'salary',
            'licensePlate',
            'manufacturer',
            'type',
        ];

        $sanitizedData = [];
        foreach ($attributes as $attribute) {
            if (isset($this->data[$attribute])) {
                $sanitizedData[] = $this->data[$attribute];
            }
        }

        return $sanitizedData;
    }
}
