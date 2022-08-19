<?php

namespace App\Actions;

use App\Models\Equipment;

class UpdateEquipmentAction
{
    public function execute(Equipment $equipment)
    {
        $data = (new ParseUrlEncodeAction())->execute();
        $id = $data->id;
        $title = $data->title;
        $amount = $data->amount;
        if (is_null($id) || is_null($title) || is_null($amount)) {
           return false;
        }
        $equipment->update($title,$amount,$id);
        return true;
    }
}