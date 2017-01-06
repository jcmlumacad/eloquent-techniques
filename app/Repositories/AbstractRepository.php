<?php namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = new $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($attrs = [])
    {
        return $this->model->fill($attrs)->save();
    }

    public function update($id, $attrs = [])
    {
        return $this->model->where('id', $id)->update($attrs);
    }

    public function delete($id)
    {
        $this->model->destroy($id);
    }
}