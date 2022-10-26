<?php

namespace App\Service\Notebook;

use App\Models\Notebook;


class Service
{
    public function isExist(int $id): bool
    {
        $notebook = Notebook::find($id);
        if(is_null($notebook)){
            return false;
        }
        return true;
    }
}
