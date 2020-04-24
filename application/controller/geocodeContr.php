<?php

include '../../model/geocodeModel.php';

class GeocodeContr extends GeocodeModel {
    public function userInput($userSearchValue) {
        $userInput = strip_tags(trim($userSearchValue));
        return $this->checkResults($userSearchValue);
        }
}
