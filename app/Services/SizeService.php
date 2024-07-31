<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Interfaces\SizeRepositoryInterface;


class SizeService
{
    protected $repository;

    public function __construct(SizeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllSizes()
    {
        return $this->repository->all();
    }

    public function getSizeById($id)
    {
        return $this->repository->find($id);
    }

    public function createSize(array $data)
    {
        $rules = [
            'size_name' => 'required|string|max:255',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $this->repository->create($data);
    }

    public function updateSize($id, array $data)
    {
        $rules = [
           'size_name' => 'required|string|max:255',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $this->repository->update($id, $data);
    }

    public function deleteSize($id)
    {
        return $this->repository->delete($id);
    }
}
