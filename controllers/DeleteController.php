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
        $this->view = 'table';
    }

    public function employeeAction(): void
    {
        (new Employee())->deleteObjectById($this->id);
    }

    public function carAction(): void
    {
        (new Car())->deleteObjectById($this->id);
    }

    public function rentalAction(): void
    {
        (new Rental())->deleteObjectById($this->id);
    }
}
