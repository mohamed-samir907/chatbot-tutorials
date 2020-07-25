<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Http\Request;

interface TodoRepositoryInterface
{
    /**
     * Get all todos.
     *
     * @return Collection
     */
    public function all();

    /**
     * Store new todo.
     *
     * @param  array $data
     * @return Collection
     */
    public function store(array $data);

    /**
     * Delete todo.
     *
     * @param  int $id
     * @return bool
     */
    public function delete(int $id);

    /**
     * Update todo.
     *
     * @param  array $data
     * @param  int $id
     * @return Collection
     */
    public function update(array $data, $id);
}