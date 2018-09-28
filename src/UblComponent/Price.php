<?php

/**
 * FACTURA ELECTRÓNICA SUNAT
 * UBL 2.1
 * Version 1.0
 * 
 * Copyright 2018, Jaime Cruz
 */

namespace F72X\UblComponent;

use F72X\Sunat\CurrencyOperations;
use Sabre\Xml\Writer;

class Price extends BaseComponent {
    
    const DECIMALS = 2;

    protected $currencyID;
    protected $PriceAmount;

    protected $validations = ['currencyID', 'PriceAmount'];


    function xmlSerialize(Writer $writer) {
        $this->validate();

        $writer->write([
            [
                'name'  => SchemaNS::CBC . 'PriceAmount',
                'value' => CurrencyOperations::formatAmount($this->PriceAmount, self::DECIMALS),
                'attributes' => [
                    'currencyID' => $this->currencyID
                ]
            ],
        ]);

    }

    public function getCurrencyID() {
        return $this->currencyID;
    }

    public function setCurrencyID($currencyID) {
        $this->currencyID = $currencyID;
        return $this;
    }

    public function getPriceAmount() {
        return $this->PriceAmount;
    }

    public function setPriceAmount($PriceAmount) {
        $this->PriceAmount = $PriceAmount;
        return $this;
    }

}
