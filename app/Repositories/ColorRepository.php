<?php

namespace App\Repositories;
use App\Interfaces\ColorRepositoryInterface;
use App\Models\Color;

class ColorRepository implements ColorRepositoryInterface
{
    public function all()
    {
        return Color::all();
    }

    public function find($id)
    {
        return Color::find($id);
    }

    public function create(array $data)
    {
        return Color::create($data);
    }

    public function update($id, array $data)
    {
        $color = Color::find($id);
        if ($color) {
            $color->update($data);
            return $color;
        }
        return null;
    }

    public function delete($id)
    {
        $color = Color::find($id);
        if ($color) {
            $color->delete();
            return true;
        }
        return false;
    }
}
