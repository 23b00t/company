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
        $this->msg = 'Löschen erfolgreich!';
    }

    /**
     * employeeAction
     *
     * @return void
     */
    protected function employeeAction(): void
    {
        (new Employee())->deleteObjectById($this->id);
    }

    /**
     * carAction
     *
     * @return void
     */
    protected function carAction(): void
    {
        (new Car())->deleteObjectById($this->id);
    }

    /**
     * rentalAction
     *
     * @return void
     */
    protected function rentalAction(): void
    {
        (new Rental())->deleteObjectById($this->id);
    }

    /**
     * handleError
     *
     * @param Throwable $e
     * @return Exception|Response
     */
    protected function handleError(Throwable $e): Exception|Response
    {
        if ($e->getCode() === '23000') {
            $response = new Response(TableHelper::getAllObjectsByArea($this->area));
            $response->setMsg('Achtung: Du kannst kein Objekt löschen, dass noch verwendet wird.');
            return $response;
        } else {
            throw new Exception($e);
        }
    }
}
