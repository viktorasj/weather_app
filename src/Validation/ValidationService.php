<?php
/**
 * Created by PhpStorm.
 * User: vic
 * Date: 11/14/18
 * Time: 9:24 PM
 */

namespace App\Validation;


class ValidationService
{
    /**
     * @var string
     */
    private $date;
    /**
     * @var null|string
     */
    private $errorMsg;

    /**
     * ValidationService constructor.
     * @param string $date
     */
    public function __construct(string $date)
    {
        $this->date = $date;
        $this->checkDate();
    }

    /**
     *
     */
    public function checkDate (): void
    {
        $dateNow = date('Y-m-d');

        if (date('Y-m-d', strtotime($this->date)) != $this->date)
        {
            $this->errorMsg = "Netinkamas datos formatas. Tinkamas - yyyy-mm-dd.";
            return;
        }
        elseif ($dateNow > $this->date)
        {
            $this->errorMsg = "Data yra praeityje.";
            return;
        }
    }

    /**
     * @return null|string
     */
    public function getErrors (): ?string
    {
        return $this->errorMsg;
    }

}