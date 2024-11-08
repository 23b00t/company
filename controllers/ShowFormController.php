<?php

/**
 * Class: ShowFormController
 *
 */
class ShowFormController extends BaseController
{
    /**
     * @var ?int $id
     */
    private ?int $id;
    /**
     * @var string $action
     */
    private string $action;

    /**
     * __construct
     *
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        parent::__construct($requestData);
        $this->id = $requestData['id'] ?? null;
        $this->view = 'form';
        $this->action = 'insert';
    }

    /**
     * invoke
     *
     * @return array
     */
    public function invoke(): Response
    {
        try {
            $array = [];
            /** Show edit form with pre-filled fields */
            if (isset($this->id)) {
                $this->action = 'update';
                if ($this->area === 'employee') {
                    $employee = (new Employee())->getObjectById($this->id);
                    $array = [  'employee' => $employee ];
                } elseif ($this->area === 'car') {
                    $car = (new Car())->getObjectById($this->id);
                    $array = [ 'car' => $car ];
                } elseif ($this->area === 'rental') {
                    $rental = (new Rental())->getObjectById($this->id);
                    $array = [ 'rental' => $rental ];
                }
            }
            $response = new Response($array);
            $response->setAction($this->action);
            return $response;
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }
}
