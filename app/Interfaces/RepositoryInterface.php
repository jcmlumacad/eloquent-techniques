<?php namespace App\Interfaces;

interface RepositoryInterface
{
    public function all();
    public function find($id);
    public function create($attrs = []);
    public function update($id, $attrs = []);
    public function delete($id);
}