<?php

/**
 * Class: DeleteController
 *
 */
class DeleteController extends BaseController
{
    /**
     * @var int $id
     */
    private int $id;

    /**
     * __construct
     *
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        parent::__construct($requestData);
        $this->id = $requestData['id'];
    }

    protected function employeeAction(): void
    {
        (new Employee())->deleteObjectById($this->id);
    }

    protected function carAction(): void
    {
        (new Car())->deleteObjectById($this->id);
    }

    protected function rentalAction(): void
    {
        (new Rental())->deleteObjectById($this->id);
    }
}
