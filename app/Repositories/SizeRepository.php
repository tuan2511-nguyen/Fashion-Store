<?php

namespace App\Repositories;

use App\Interfaces\SizeRepositoryInterface;
use App\Models\Size;

class SizeRepository implements SizeRepositoryInterface
{
    public function all(){
        return Size::all();
    }
    public function find($id){
        return Size::find($id);
    }
    public function create(array $data){
        return Size::create($data);
    }
    public function update($id, array $data){
        $size = Size::find($id);
        if ($size) {
            $size->update($data);
            return $size;
        }
        return null;
    }
    public function delete($id){
        $size = Size::find($id);
        if ($size) {
            $size->delete();
            return true;
        }
        return false;
    }
}
