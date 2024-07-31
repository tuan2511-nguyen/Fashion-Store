<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Interfaces\ColorRepositoryInterface;

class ColorService
{
    protected $repository;

    public function __construct(ColorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllColors()
    {
        return $this->repository->all();
    }

    public function getColorById($id)
    {
        return $this->repository->find($id);
    }

    public function createColor(array $data)
    {
        $rules = [
            'color_name' => 'required|string|max:255',
            'color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $this->repository->create($data);
    }

    public function updateColor($id, array $data)
    {
        $rules = [
            'color_name' => 'required|string|max:255',
            'color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $this->repository->update($id, $data);
    }

    public function deleteColor($id)
    {
        return $this->repository->delete($id);
    }
}
