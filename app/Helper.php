<?php


use App\District;

function isActualDistrict($districtName){
    $district = District::where('name', $districtName)->first();
    if($district){
        return true;
    }
    return false;
}